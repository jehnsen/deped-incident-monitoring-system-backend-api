<?php

namespace App\Http\Requests\EvacuationCenter;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEvacuationCenterRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'school_id' => ['sometimes','exists:schools,id'],
            'name'      => ['sometimes','string','max:255'],
            'address'   => ['sometimes','string','max:255','nullable'],
            'capacity'  => ['sometimes','integer','min:0'],
            'latitude'  => ['sometimes','numeric','between:-90,90','nullable'],
            'longitude' => ['sometimes','numeric','between:-180,180','nullable'],
        ];
    }
}
