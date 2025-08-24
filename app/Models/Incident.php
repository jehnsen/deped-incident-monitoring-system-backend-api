<?php

namespace App\Models;

use App\Enums\IncidentSeverity;
use App\Enums\IncidentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Incident extends Model
{
    protected $fillable = [
        'ref_no',
        'type_id',
        'school_id',
        'reported_by_user_id',
        'title',
        'description',
        'status',
        'severity',
        'occurred_at',
        'reported_at',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'status'   => IncidentStatus::class,
        'severity' => IncidentSeverity::class,
        'occurred_at' => 'datetime',
        'reported_at' => 'datetime',
    ];

    public function type(): BelongsTo { return $this->belongsTo(IncidentType::class,'type_id'); }
    public function school(): BelongsTo { return $this->belongsTo(School::class); }
    public function reporter(): BelongsTo { return $this->belongsTo(User::class,'reported_by_user_id'); }

    public function attachments(): HasMany { return $this->hasMany(IncidentAttachment::class); }
    public function statuses(): HasMany { return $this->hasMany(IncidentStatusHistory::class); }
    public function affected(): HasMany { return $this->hasMany(AffectedPopulation::class); }
    public function damages(): HasMany { return $this->hasMany(DamageAssessment::class); }
    public function assistance(): HasMany { return $this->hasMany(Assistance::class); }
    public function occupancies(): HasMany { return $this->hasMany(EvacuationOccupancy::class); }
}
