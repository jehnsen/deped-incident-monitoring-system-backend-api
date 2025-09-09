<?php

namespace App\Http\Requests\AffectedPopulation;

use Illuminate\Foundation\Http\FormRequest;

class StoreAffectedPopulationRequest extends FormRequest
{
    public function authorize(): bool { return true; }
    public function rules(): array
    {
        return [
            'incident_id'       => ['required','exists:incidents,id'],
            'students_affected' => ['required','integer','min:0'],
            'teachers_affected' => ['required','integer','min:0'],
            'staff_affected'    => ['required','integer','min:0'],
            'injured'           => ['required','integer','min:0'],
            'missing'           => ['required','integer','min:0'],
            'deceased'          => ['required','integer','min:0'],
            'evacuees'          => ['required','integer','min:0'],
        ];
    }
}
