<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EvacuationCenter extends Model
{
    protected $fillable = ['school_id','name','address','capacity','latitude','longitude'];
    public function school(): BelongsTo { return $this->belongsTo(School::class); }
}
