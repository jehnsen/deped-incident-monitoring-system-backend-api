<?php

namespace App\Http\Requests\IncidentType;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateIncidentTypeRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        $id = $this->route('incident_type');
        return [
            'code'        => ['sometimes','string','max:32', Rule::unique('incident_types','code')->ignore($id)],
            'name'        => ['sometimes','string','max:255'],
            'description' => ['sometimes','nullable','string','max:255'],
        ];
    }
}
