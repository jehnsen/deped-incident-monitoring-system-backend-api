<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DamageAssessment extends Model
{
    protected $fillable = [
        'incident_id',
        'classrooms_damaged_minor',
        'classrooms_damaged_major',
        'estimated_cost',
        'notes',
        'affected_households',
        'totally_damaged',
        'partially_damaged',
        'injuries',
        'deaths',
        'missing',
        'displaced_families',
        'estimated_loss_amount',
        'status',
        'assessed_by_user_id',
        'assessed_at',
    ];

    protected $casts = [
        'assessed_at'           => 'datetime',
        'estimated_cost'        => 'decimal:2',
        'estimated_loss_amount' => 'decimal:2',
    ];

    public function incident(): BelongsTo { return $this->belongsTo(Incident::class); }
    // public function assessor(): BelongsTo { return $this->belongsTo(User::class, 'assessed_by_user_id'); }
}
