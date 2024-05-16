<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
//    public function authorize(): bool
//    {
//        return false;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'addName' => ['required', 'string', 'max:100'],
            'addEmail' => ['required', 'email', 'max:100', 'unique:users,email'],
            'addRole'   => ['required'],
            'addPassword' => ['required', 'min:6'],
            'addPassConfirm' => ['required', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
          'addEmail.unique' => 'Email sudah digunakan!',
          'addPassword.min' => 'Kata sandi terlalu pendek!',
        ];
    }
}
