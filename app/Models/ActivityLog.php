<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActivityLog extends Model
{
    protected $fillable = [
        'action',
        'description',
        'subject_type',
        'subject_id',
        'actor_user_id',
        'meta',
        'ip_address',
        'user_agent',
    ];

    protected $casts = [
        'meta'       => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /** The model being acted on (Incident, Issuance, etc.) */
    public function subject(): MorphTo
    {
        return $this->morphTo();
    }

    /** The user who performed the action */
    public function actor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'actor_user_id');
    }

    /* ---------- Query helpers (optional) ---------- */
    public function scopeForSubject($q, string $type, int $id)
    {
        return $q->where('subject_type', $type)->where('subject_id', $id);
    }

    public function scopeAction($q, string $action)
    {
        return $q->where('action', $action);
    }

    public function scopeActor($q, int $userId)
    {
        return $q->where('actor_user_id', $userId);
    }

    public function scopeBetween($q, ?string $from, ?string $to)
    {
        if ($from) $q->where('created_at', '>=', $from);
        if ($to)   $q->where('created_at', '<=', $to);
        return $q;
    }
}
