<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'name.required' => 'Ism kiriting!',
            'email.required' => 'Email kiriting!',
            'password.required' => 'Parol kiriting!',
            'confirm_password.required' => 'Parol tasdiqlang!',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'confirm_password' => ['required', 'string', 'min:8', 'same:password'],
        ];
    }
}
