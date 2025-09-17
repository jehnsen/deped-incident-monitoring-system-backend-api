<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncidentTimeline extends Model
{
    // Table: incident_timelines (default from class name)
    // PK: id (bigint, auto-increment)

    protected $fillable = [
        'incident_id',
        'event',
        'performed_by_user_id',
        'timestamp',
    ];

    protected $casts = [
        'timestamp' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /** Parent incident */
    public function incident(): BelongsTo
    {
        return $this->belongsTo(Incident::class);
    }

    /** User who performed the action */
    public function performer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'performed_by_user_id');
    }

    /* -------- Optional handy scopes -------- */

    /** Order by chronological timestamp (asc by default) */
    public function scopeChrono($query, string $dir = 'asc')
    {
        return $query->orderBy('timestamp', $dir);
    }

    /** Filter by incident id */
    public function scopeForIncident($query, int $incidentId)
    {
        return $query->where('incident_id', $incidentId);
    }
}
