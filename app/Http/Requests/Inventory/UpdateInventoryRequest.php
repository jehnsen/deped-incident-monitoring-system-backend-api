<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
{
   public function authorize(): bool
   {
      return true;
   }

   public function rules(): array
   {
      return [
         'equipment_name' => 'sometimes|string|max:255',
         'equipment_type' => 'sometimes|string|max:128',
         'category' => 'sometimes|string|max:128',
         'unit' => 'sometimes|string|max:32',
         'quantity' => 'sometimes|integer|min:0',
         'condition' => 'sometimes|string|max:64',

         'school_id' => 'sometimes|nullable|exists:schools,id',
         'location' => 'sometimes|nullable|string|max:255',

         'serial_number' => 'sometimes|nullable|string|max:128',
         'purchase_date' => 'sometimes|nullable|date',
         'warranty_period' => 'sometimes|nullable|string|max:64',
         'purchase_cost' => 'sometimes|nullable|numeric|min:0',
         'supplier' => 'sometimes|nullable|string|max:255',

         'description' => 'sometimes|nullable|string',
         'is_qrf_funded' => 'sometimes|boolean',

         'attachments' => 'sometimes|array',
         'attachments.*.file_path' => 'required_with:attachments|string',
         'attachments.*.file_type' => 'nullable|string|max:128',
         'attachments.*.original_name' => 'nullable|string|max:255',
      ];
   }

}
