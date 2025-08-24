<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncidentStatusHistory extends Model
{
    protected $fillable = ['incident_id','from_status','to_status','notes','changed_by_user_id','changed_at'];
    protected $casts = ['changed_at' => 'datetime'];
    public function incident(): BelongsTo { return $this->belongsTo(Incident::class); }
}