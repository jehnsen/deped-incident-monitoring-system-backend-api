<?php

namespace App\Http\Requests\EvacuationCenter;

use Illuminate\Foundation\Http\FormRequest;

class StoreEvacuationCenterRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'school_id' => ['required','exists:schools,id'],
            'name'      => ['required','string','max:255'],
            'address'   => ['nullable','string','max:255'],
            'capacity'  => ['required','integer','min:0'],
            'latitude'  => ['nullable','numeric','between:-90,90'],
            'longitude' => ['nullable','numeric','between:-180,180'],
        ];
    }
}
