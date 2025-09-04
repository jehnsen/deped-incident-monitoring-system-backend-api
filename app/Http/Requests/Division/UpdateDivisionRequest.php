<?php

namespace App\Http\Requests\Division;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDivisionRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        $id = $this->route('division');
        return [
            'region_id' => ['sometimes','exists:regions,id'],
            'code'      => ['sometimes','string','max:10', Rule::unique('divisions','code')->ignore($id)],
            'name'      => ['sometimes','string','max:255'],
        ];
    }
}
