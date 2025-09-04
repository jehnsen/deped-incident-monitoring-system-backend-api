<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Assistance extends Model
{
    protected $fillable = ['incident_id', 'assistance_type', 'quantity', 'unit', 'delivered_at', 'delivered_by', 'remarks'];
    protected $casts = ['delivered_at' => 'datetime'];
    public function incident(): BelongsTo
    {
        return $this->belongsTo(Incident::class);
    }
}