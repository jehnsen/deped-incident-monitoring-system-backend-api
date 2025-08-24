<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EvacuationOccupancy extends Model
{
    protected $fillable = ['incident_id','evacuation_center_id','households','individuals','reported_at'];
    protected $casts = ['reported_at' => 'datetime'];
    public function incident(): BelongsTo { return $this->belongsTo(Incident::class); }
    public function center(): BelongsTo { return $this->belongsTo(EvacuationCenter::class,'evacuation_center_id'); }
}
