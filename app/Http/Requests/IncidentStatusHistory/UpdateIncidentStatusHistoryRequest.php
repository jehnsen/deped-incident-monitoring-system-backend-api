<?php

namespace App\Http\Requests\IncidentStatusHistory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIncidentStatusHistoryRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'from_status'        => ['sometimes','string','max:20','nullable'],
            'to_status'          => ['sometimes','string','max:20'],
            'notes'              => ['sometimes','string','nullable'],
            'changed_by_user_id' => ['sometimes','exists:users,id'],
            'changed_at'         => ['sometimes','date','nullable'],
        ];
    }
}
