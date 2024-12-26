<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRole extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {

        return [
            'name' => ['required', Rule::unique('roles')->ignore($this->role)],
            'permissions' => ['required', 'array', 'min:1'],
        ];
    }
}
