<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdmin extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', Rule::unique('admins')->ignore($this->admin)],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role_id' => 'required',
        ];
    }
}
