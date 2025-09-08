<?php

namespace App\Http\Requests\Assistance;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAssistanceRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'incident_id'             => ['sometimes','exists:incidents,id'],
            'assistance_type'         => ['sometimes','in:food,cash,shelter,medicine,non-food,others'],
            'description'             => ['sometimes','nullable','string','max:255'],
            'quantity'                => ['sometimes','integer','min:0'],
            'unit'                    => ['sometimes','nullable','string','max:32'],
            'amount'                  => ['sometimes','numeric','min:0'],
            'date_provided'           => ['sometimes','nullable','date'],
            'provider_agency'         => ['sometimes','nullable','string','max:255'],
            'received_by_resident_id' => ['sometimes','nullable','exists:residents,id'],
            'approved_by_user_id'     => ['sometimes','nullable','exists:users,id'],
            'status'                  => ['sometimes','in:pending,released,received,cancelled'],
            'remarks'                 => ['sometimes','nullable','string'],
        ];
    }
}
