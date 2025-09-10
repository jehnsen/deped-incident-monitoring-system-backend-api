<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
{
   public function authorize(): bool
   {
      return true;
   }

   public function rules(): array
   {
      return [
         'equipment_name' => 'required|string|max:255',
         'equipment_type' => 'required|string|max:128',
         'category' => 'nullable|string|max:128',
         'unit' => 'required|string|max:32',
         'quantity' => 'required|integer|min:0',
         'condition' => 'required|string|max:64',

         'school_id' => 'nullable|exists:schools,id',
         'location' => 'nullable|string|max:255',

         'serial_number' => 'nullable|string|max:128',
         'purchase_date' => 'nullable|date',
         'warranty_period' => 'nullable|string|max:64',
         'purchase_cost' => 'nullable|numeric|min:0',
         'supplier' => 'nullable|string|max:255',

         'description' => 'nullable|string',
         'is_qrf_funded' => 'boolean',

         // attachments on create (optional bulk)
         'attachments' => 'array',
         'attachments.*.file_path' => 'required_with:attachments|string',
         'attachments.*.file_type' => 'nullable|string|max:128',
         'attachments.*.original_name' => 'nullable|string|max:255',
      ];
   }
}
