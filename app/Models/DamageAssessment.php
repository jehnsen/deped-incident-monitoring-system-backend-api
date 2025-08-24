<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DamageAssessment extends Model
{
    protected $fillable = ['incident_id','classrooms_damaged_minor','classrooms_damaged_major','estimated_cost','notes'];
    public function incident(): BelongsTo { return $this->belongsTo(Incident::class); }
}
