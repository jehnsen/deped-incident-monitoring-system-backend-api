<?php

namespace App\Models;

use App\Enums\RiskStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class School extends Model
{
    protected $fillable = ['division_id','school_id_code','name','address','contact_email','contact_phone','enrollment','latitude','longitude','risk_status'];
    // protected $casts = ['risk_status' => RiskStatus::class];
    public function division(): BelongsTo { return $this->belongsTo(Division::class); }
}