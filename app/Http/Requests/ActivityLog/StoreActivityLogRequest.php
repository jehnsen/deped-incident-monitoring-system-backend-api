<?php

namespace App\Http\Requests\ActivityLog;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivityLogRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'action'        => ['required','string'],
            'description'   => ['nullable','string'],
            'subject_type'  => ['nullable'],
            'subject_id'    => ['nullable','integer','min:1'],
            'actor_user_id' => ['nullable','exists:users,id'],
            'meta'          => ['nullable'],
            'ip_address'    => ['nullable','string'],
            'user_agent'    => ['nullable','string'],
        ];
    }
}
