<?php

namespace App\Http\Requests\Division;

use Illuminate\Foundation\Http\FormRequest;

class StoreDivisionRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'region_id' => ['required','exists:regions,id'],
            'code'      => ['required','string','max:10','unique:divisions,code'],
            'name'      => ['required','string','max:255'],
        ];
    }
}
