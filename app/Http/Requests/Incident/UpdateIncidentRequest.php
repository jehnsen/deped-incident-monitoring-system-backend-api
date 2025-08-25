<?php

namespace App\Http\Requests\Incident;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateIncidentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('incident');
        return [
            'ref_no'      => ['sometimes','string','max:64', Rule::unique('incidents','ref_no')->ignore($id)],
            'type_id'     => ['sometimes','exists:incident_types,id'],
            'school_id'   => ['sometimes','exists:schools,id'],
            'reported_by_user_id' => ['sometimes','nullable','exists:users,id'],
            'title'       => ['sometimes','string','max:255'],
            'description' => ['sometimes','nullable','string'],
            'status'      => ['sometimes','in:reported,verified,responding,resolved,closed'],
            'severity'    => ['sometimes','in:low,medium,high,critical'],
            'occurred_at' => ['sometimes','date'],
            'reported_at' => ['sometimes','date'],
            'latitude'    => ['sometimes','nullable','numeric','between:-90,90'],
            'longitude'   => ['sometimes','nullable','numeric','between:-180,180'],
        ];
    }
}
