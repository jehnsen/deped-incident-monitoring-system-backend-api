<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    protected $fillable = ['region_id','code','name'];
    public function region(): BelongsTo { return $this->belongsTo(Region::class); }
    public function schools(): HasMany { return $this->hasMany(School::class); }
}
