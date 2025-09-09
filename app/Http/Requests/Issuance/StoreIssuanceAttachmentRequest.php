<?php

namespace App\Http\Requests\IssuanceAttachment;

use Illuminate\Foundation\Http\FormRequest;

class StoreIssuanceAttachmentRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array {
        return [
            'issuance_id' => 'required|exists:issuances,id',
            'file_path' => 'required|string',
            'file_type' => 'nullable|string|max:128',
            'original_name' => 'nullable|string|max:255',
        ];
    }
}
