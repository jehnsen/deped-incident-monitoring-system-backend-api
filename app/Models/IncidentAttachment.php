<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncidentAttachment extends Model
{
    protected $fillable = ['incident_id','file_path','file_type','original_name'];
    public function incident(): BelongsTo { return $this->belongsTo(Incident::class); }
}

