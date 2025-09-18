<?php

namespace App\Http\Requests\ActivityLog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateActivityLogRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        // Typically logs are immutable; let’s allow editing description/meta only.
        return [
            'description' => ['sometimes','nullable','string'],
            'meta'        => ['sometimes','nullable','array'],
        ];
    }
}
