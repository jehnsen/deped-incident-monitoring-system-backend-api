<?php

namespace App\Http\Requests\IssuanceAttachment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIssuanceAttachmentRequest extends FormRequest
{
   public function authorize(): bool
   {
      return true;
   }
   public function rules(): array
   {
      return [
         'issuance_id' => 'sometimes|exists:issuances,id',
         'file_path' => 'sometimes|string',
         'file_type' => 'sometimes|string|max:128',
         'original_name' => 'sometimes|string|max:255',
      ];
   }
}
