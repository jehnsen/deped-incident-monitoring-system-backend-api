<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IssuanceTag extends Model
{
    protected $table = 'issuance_tags';
    protected $fillable = ['name'];

    public function issuance(): BelongsTo
    {
        return $this->belongsTo(Issuance::class);
    }
}
