<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'address_id.required' => 'Manzil kiriting tasdiqlang!',
            'name.required' => 'Ism kiriting!',
            'surname.required' => 'Familiya kiriting!',
            'phone.required' => 'Telefon raqam kiriting!',
            'phone.unique' => 'Kechirasiz ushbu raqamdagi mijoz oldin ham ro\'yhatdan o\'tgan!',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'address_id' => ['required'],
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'surname' => ['required', 'string', 'max:255', 'min:3'],
            'phone' => ['required', 'max:17', 'unique:customers,phone'],
        ];
    }
}
