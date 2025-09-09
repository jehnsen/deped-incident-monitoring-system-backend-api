<?php

namespace App\Http\Requests\EvacuationOccupancy;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEvacuationOccupancyRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'incident_id'          => ['sometimes','exists:incidents,id','nullable'],
            'evacuation_center_id' => ['sometimes','exists:evacuation_centers,id','nullable'],
            'households'           => ['sometimes','integer','min:0','nullable'],
            'individuals'          => ['sometimes','integer','min:0','nullable'],
            'reported_at'          => ['sometimes','date','nullable'],
        ];
    }
}
