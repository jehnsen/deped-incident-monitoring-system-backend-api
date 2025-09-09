<?php

namespace App\Http\Requests\AffectedPopulation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAffectedPopulationRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array
    {
        return [
            'students_affected' => ['sometimes','integer','min:0'],
            'teachers_affected' => ['sometimes','integer','min:0'],
            'staff_affected'    => ['sometimes','integer','min:0'],
            'injured'           => ['sometimes','integer','min:0'],
            'missing'           => ['sometimes','integer','min:0'],
            'deceased'          => ['sometimes','integer','min:0'],
            'evacuees'          => ['sometimes','integer','min:0'],
        ];
    }
}
