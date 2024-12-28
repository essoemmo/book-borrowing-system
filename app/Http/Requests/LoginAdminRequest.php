<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginAdminRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'exists:admins,email', 'max:155'],
            'password' => ['required', 'min:8'],
            'remember' => ['nullable'],
        ];
    }
}
