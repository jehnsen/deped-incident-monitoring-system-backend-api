<?php

namespace App\Http\Requests\DamageAssessment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDamageAssessmentRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'incident_id'              => ['sometimes','exists:incidents,id'],

            'classrooms_damaged_minor' => ['sometimes','integer','min:0','nullable'],
            'classrooms_damaged_major' => ['sometimes','integer','min:0','nullable'],
            'estimated_cost'           => ['sometimes','numeric','min:0','nullable'],

            'affected_households'      => ['sometimes','integer','min:0','nullable'],
            'totally_damaged'          => ['sometimes','integer','min:0','nullable'],
            'partially_damaged'        => ['sometimes','integer','min:0','nullable'],
            'injuries'                 => ['sometimes','integer','min:0','nullable'],
            'deaths'                   => ['sometimes','integer','min:0','nullable'],
            'missing'                  => ['sometimes','integer','min:0','nullable'],
            'displaced_families'       => ['sometimes','integer','min:0','nullable'],

            'estimated_loss_amount'    => ['sometimes','numeric','min:0','nullable'],

            'status'                   => ['sometimes','in:draft,submitted,verified,approved','nullable'],
            'assessed_by_user_id'      => ['sometimes','exists:users,id','nullable'],
            'assessed_at'              => ['sometimes','date','nullable'],

            'notes'                    => ['sometimes','string','max:2000','nullable'],
        ];
    }
}
