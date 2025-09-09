<?php

namespace App\Http\Requests\Hazard;

use Illuminate\Foundation\Http\FormRequest;

class StoreHazardRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array {
        return [
            'code' => 'required|string|max:64|unique:hazards,code',
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
        ];
    }
}
