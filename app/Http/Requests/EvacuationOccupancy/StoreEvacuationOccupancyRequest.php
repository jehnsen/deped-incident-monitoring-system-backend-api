<?php

namespace App\Http\Requests\EvacuationOccupancy;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvacuationOccupancyRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'incident_id'          => ['required','exists:incidents,id'],
            'evacuation_center_id' => ['required','exists:evacuation_centers,id'],
            'households'           => ['required','integer','min:0'],
            'individuals'          => ['required','integer','min:0'],
            'reported_at'          => ['required','date'],
        ];
    }
}
