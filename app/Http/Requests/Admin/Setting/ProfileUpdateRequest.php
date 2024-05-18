<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          => ['required', 'max:100'],
            'email'         => ['required', 'email', Rule::unique('users', 'email')->ignore($this->route('user'))],
            'newPass'       => ['min:8'],
            'confirmPass'   => ['min:8'],
        ];
    }

    public function messages()
    {
        return [
            'name.max'  => 'Nama terlalu panjang!',
            'email.unique' => 'Email sudah digunakan!',
            'newPass.min'   => 'Kata sandi minimal 8 karakter!',
        ];
    }
}
