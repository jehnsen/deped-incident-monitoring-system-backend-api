<?php

namespace App\Http\Requests\Program\StoreProgramRequest;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgramRequest extends FormRequest
{
   public function authorize(): bool
   {
      return true;
   }
   public function rules(): array
   {
      return [
         'code' => 'required|string|max:64|unique:programs,code',
         'title' => 'required|string|max:255',
         'description' => 'required|string',

         'program_type' => 'required|string|max:128',
         'priority_level' => 'nullable|string|max:64',

         // Either division_id or division text (whichever your UI sends)
         'division_id' => 'nullable|exists:divisions,id',
         'division' => 'nullable|string|max:255',

         'start_date' => 'required|date',
         'end_date' => 'required|date|after_or_equal:start_date',
         'budget_php' => 'nullable|numeric|min:0',
         'funding_source' => 'nullable|string|max:255',
         'is_qrf_funded' => 'boolean',

         'program_coordinator' => 'nullable|string|max:255',
         'expected_participants' => 'nullable|integer|min:0',
         'objectives' => 'array',                 // ["Objective 1","Objective 2",...]
         'objectives.*' => 'string|max:500',

         // existing relations
         'hazard_ids' => 'array',
         'hazard_ids.*' => 'integer|exists:hazards,id',
         'tag_ids' => 'array',
         'tag_ids.*' => 'integer|exists:tags,id',

         // Milestones (optional on create)
         'milestones' => 'array',
         'milestones.*.title' => 'required_with:milestones|string|max:255',
         'milestones.*.milestone_date' => 'nullable|date',
         'milestones.*.description' => 'nullable|string',
      ];
   }

}
