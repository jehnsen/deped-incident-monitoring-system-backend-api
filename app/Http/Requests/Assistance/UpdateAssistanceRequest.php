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
            'assistance_type'         => ['sometimes','in:food,cash,shelter,medicine,non-food,others','nullable'],
            'description'             => ['sometimes','string','max:255','nullable'],

            'quantity'                => ['sometimes','numeric','min:0','nullable'],
            'unit'                    => ['sometimes','string','max:32','nullable'],
            'amount'                  => ['sometimes','numeric','min:0','nullable'],

            'date_provided'           => ['sometimes','date','nullable'],
            'delivered_at'            => ['sometimes','date','nullable'],

            'provider_agency'         => ['sometimes','string','max:255','nullable'],
            'delivered_by'            => ['sometimes','string','max:255','nullable'],

            'received_by_resident_id' => ['sometimes','exists:residents,id','nullable'],
            'approved_by_user_id'     => ['sometimes','exists:users,id','nullable'],
            'status'                  => ['sometimes','in:pending,released,received,cancelled','nullable'],

            'remarks'                 => ['sometimes','string','max:1000','nullable'],
        ];
    }
}
