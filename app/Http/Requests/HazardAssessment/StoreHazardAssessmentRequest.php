<?php

namespace App\Http\Requests\HazardAssessment;

use Illuminate\Foundation\Http\FormRequest;

class StoreHazardAssessmentRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array {
        return [
            'assessment_title' => 'required|string|max:255',
            'hazard_id' => 'required|exists:hazards,id',
            'location' => 'required|string|max:255',
            'risk_level' => 'required|string|max:32',
            'description' => 'nullable|string',
            'methodology' => 'nullable|string',
            'key_findings' => 'nullable|string',
            'recommendations' => 'nullable|string',
            'number_of_schools' => 'required|integer|min:0',
            'estimated_impact' => 'nullable|string|max:64',
            'status' => 'nullable|string|max:32',
            'submitted_by' => 'nullable|exists:users,id',
            'validated_by' => 'nullable|exists:users,id',
        ];
    }
}
