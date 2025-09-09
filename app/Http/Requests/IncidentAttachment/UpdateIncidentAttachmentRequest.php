<?php

namespace App\Http\Requests\IncidentAttachment;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIncidentAttachmentRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'file_path'     => ['sometimes','string','max:255'],
            'file_type'     => ['sometimes','string','max:50'],
            'original_name' => ['sometimes','string','max:255'],
        ];
    }
}
