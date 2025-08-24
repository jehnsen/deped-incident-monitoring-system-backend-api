<?php

namespace App\Http\Requests\Incident;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncidentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ref_no'      => ['required','string','max:64','unique:incidents,ref_no'],
            'type_id'     => ['required','exists:incident_types,id'],
            'school_id'   => ['required','exists:schools,id'],
            'reported_by_user_id' => ['nullable','exists:users,id'],
            'title'       => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'status'      => ['required','in:reported,verified,responding,resolved,closed'],
            'severity'    => ['required','in:low,medium,high,critical'],
            'occurred_at' => ['required','date'],
            'reported_at' => ['required','date'],
            'latitude'    => ['nullable','numeric','between:-90,90'],
            'longitude'   => ['nullable','numeric','between:-180,180'],
        ];
    }
}
