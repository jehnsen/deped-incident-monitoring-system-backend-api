<?php

namespace App\Http\Requests\Assistance;

use Illuminate\Foundation\Http\FormRequest;

class StoreAssistanceRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'incident_id'             => ['required','exists:incidents,id'],
            'assistance_type'         => ['required','in:food,cash,shelter,medicine,non-food,others'],
            'description'             => ['nullable','string','max:255'],
            'quantity'                => ['nullable','integer','min:0'],
            'unit'                    => ['nullable','string','max:32'],
            'amount'                  => ['nullable','numeric','min:0'],
            'date_provided'           => ['nullable','date'],
            'provider_agency'         => ['nullable','string','max:255'],
            'received_by_resident_id' => ['nullable','exists:residents,id'],
            'approved_by_user_id'     => ['nullable','exists:users,id'],
            'status'                  => ['nullable','in:pending,released,received,cancelled'],
            'remarks'                 => ['nullable','string'],
        ];
    }
}
