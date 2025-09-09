<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IssuanceAttachment extends Model
{
    protected $fillable = ['issuance_id','file_path','file_type','original_name'];
    public function issuance(): BelongsTo { return $this->belongsTo(Issuance::class); }
}
