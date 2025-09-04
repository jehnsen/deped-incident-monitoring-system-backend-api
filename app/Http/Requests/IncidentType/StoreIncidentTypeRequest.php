<?php

namespace App\Http\Requests\IncidentType;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncidentTypeRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'code'        => ['required','string','max:32','unique:incident_types,code'],
            'name'        => ['required','string','max:255'],
            'description' => ['nullable','string','max:255'],
        ];
    }
}
