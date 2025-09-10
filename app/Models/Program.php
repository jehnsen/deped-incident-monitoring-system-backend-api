<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Program extends Model
{
   protected $fillable = [
      'code',
      'title',
      'description',
      'owner_office',
      'location',
      'status',
      'start_date',
      'end_date',
      'budget_php',
      'spent_php',
      'target_beneficiaries',
      // NEW
      'program_type',
      'priority_level',
      'division_id',
      'division',
      'funding_source',
      'is_qrf_funded',
      'program_coordinator',
      'expected_participants',
      'objectives'
   ];

   protected $casts = [
      'start_date' => 'date',
      'end_date' => 'date',
      'budget_php' => 'decimal:2',
      'spent_php' => 'decimal:2',
      'is_qrf_funded' => 'boolean',
      'objectives' => 'array', // JSON array
   ];

   public function hazards(): BelongsToMany
   {
      return $this->belongsToMany(Hazard::class, 'hazard_program');
   }
   public function tags(): BelongsToMany
   {
      return $this->belongsToMany(Tag::class, 'program_tag');
   }
   public function milestones(): HasMany
   {
      return $this->hasMany(ProgramMilestone::class);
   }

   public function division(): BelongsTo
   {
      return $this->belongsTo(Division::class); // exists only if you have Division model/table
   }
}
