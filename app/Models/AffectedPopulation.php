<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AffectedPopulation extends Model
{
    protected $fillable = ['incident_id','students_affected','teachers_affected','staff_affected','injured','missing','deceased','evacuees'];
    public function incident(): BelongsTo { return $this->belongsTo(Incident::class); }
}
