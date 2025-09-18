<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $table = 'tags';
    protected $fillable = ['name'];

    public function incidents(): BelongsToMany
    {
        return $this->belongsToMany(Incident::class)->withTimestamps();
    }

    public function issuances(): BelongsToMany
    {
        return $this->belongsToMany(Issuance::class, 'issuance_tags', 'tag_id', 'issuance_id')->withTimestamps();
    }
}