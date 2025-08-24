<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $fillable = ['code','name'];
    public function divisions(): HasMany { return $this->hasMany(Division::class); }
}
