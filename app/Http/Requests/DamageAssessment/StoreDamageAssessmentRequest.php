<?php

namespace App\Http\Requests\DamageAssessment;

use Illuminate\Foundation\Http\FormRequest;

class StoreDamageAssessmentRequest extends FormRequest
{
   public function authorize(): bool
   {
      return true;
   }

   public function rules(): array
   {
      return [
         'incident_id' => ['required', 'exists:incidents,id'],

         // classroom-level (existing)
         'classrooms_damaged_minor' => ['nullable', 'integer', 'min:0'],
         'classrooms_damaged_major' => ['nullable', 'integer', 'min:0'],
         'estimated_cost' => ['nullable', 'numeric', 'min:0'],

         // rich totals
         'affected_households' => ['nullable', 'integer', 'min:0'],
         'totally_damaged' => ['nullable', 'integer', 'min:0'],
         'partially_damaged' => ['nullable', 'integer', 'min:0'],
         'injuries' => ['nullable', 'integer', 'min:0'],
         'deaths' => ['nullable', 'integer', 'min:0'],
         'missing' => ['nullable', 'integer', 'min:0'],
         'displaced_families' => ['nullable', 'integer', 'min:0'],

         // financial (new)
         'estimated_loss_amount' => ['nullable', 'numeric', 'min:0'],

         // status/meta
         'status' => ['nullable', 'in:draft,submitted,verified,approved'],
         'assessed_by_user_id' => ['nullable', 'exists:users,id'],
         'assessed_at' => ['nullable', 'date'],

         'notes' => ['nullable'],
      ];
   }
}
