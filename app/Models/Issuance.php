<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Issuance extends Model
{
    protected $fillable = [
        'type','level','series_year','reference_number','title',
        'effective_date','valid_until','summary'
    ];

    protected $casts = [
        'series_year' => 'integer',
        'effective_date' => 'date',
        'valid_until' => 'date',
    ];

    public function attachments(): HasMany
    {
        return $this->hasMany(IssuanceAttachment::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'issuance_tags', 'issuance_id', 'tag_id')->withTimestamps();
    }

    public function hazards(): BelongsToMany
    {
        return $this->belongsToMany(Hazard::class, 'issuance_hazard');
    }

    public function incident(): BelongsToMany
    {
        return $this->belongsToMany(Incident::class, 'incidents');
    }

    public function incidents(): BelongsToMany
    {
        return $this->belongsToMany(
            Incident::class,
            'incident_issuances',   // pivot table
            'issuance_id',          // FK on pivot to this model
            'incident_id'           // FK on pivot to the related model
        )->withTimestamps();
    }
}
