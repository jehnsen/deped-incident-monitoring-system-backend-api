<?php

namespace App\Http\Requests\IncidentStatusHistory;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncidentStatusHistoryRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'incident_id'        => ['required','exists:incidents,id'],
            'from_status'        => ['nullable','string','max:20'],
            'to_status'          => ['required','string','max:20'],
            'notes'              => ['nullable','string'],
            'changed_by_user_id' => ['required','exists:users,id'],
            'changed_at'         => ['required','date'],
        ];
    }
}
