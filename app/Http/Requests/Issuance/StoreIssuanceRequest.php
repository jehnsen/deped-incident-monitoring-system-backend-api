<?php

namespace App\Http\Requests\Issuance;

use Illuminate\Foundation\Http\FormRequest;

class StoreIssuanceRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array {
        return [
            'type' => 'required|string|max:64',
            'level' => 'required|string|max:64',
            'series_year' => 'required|integer|min:2000|max:2100',
            'reference_number' => 'required|string|max:64',
            'title' => 'required|string|max:255',
            'effective_date' => 'required|date',
            'valid_until' => 'nullable|date|after_or_equal:effective_date',
            'summary' => 'nullable|string',
            'tag_ids' => 'array',
            'tag_ids.*' => 'integer|exists:tags,id',
            'hazard_ids' => 'array',
            'hazard_ids.*' => 'integer|exists:hazards,id',
            'attachments' => 'array',
            'attachments.*.file_path' => 'required|string',
            'attachments.*.file_type' => 'nullable|string|max:128',
            'attachments.*.original_name' => 'nullable|string|max:255',
        ];
    }
}
