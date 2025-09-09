<?php

namespace App\Http\Requests\IncidentAttachment;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncidentAttachmentRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'incident_id'   => ['required','exists:incidents,id'],
            'file_path'     => ['required','string','max:255'],
            'file_type'     => ['required','string','max:50'],
            'original_name' => ['required','string','max:255'],
        ];
    }
}
