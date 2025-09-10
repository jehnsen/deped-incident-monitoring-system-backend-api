<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProgramMilestone extends Model
{
   protected $fillable = ['program_id', 'title', 'milestone_date', 'description'];
   protected $casts = ['milestone_date' => 'date'];

   public function program(): BelongsTo
   {
      return $this->belongsTo(Program::class);
   }
}

