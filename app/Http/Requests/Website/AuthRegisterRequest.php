<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
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
            'fullname'  => 'required|string|max:100',
            'email'     => 'required|email|email:dns|max:100|unique:guests,email',
            'phone'     => 'required|unique:guests,phone',
            'gender'    => 'required',
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'fullname.max' => 'Nama terlalu panjang!',
            'email.unique'  => 'Email sudah digunakan',
            'email.max'     => 'Email terlalu panjang',
            'phone.unique'  => 'No Telepon sudah digunakan',
            'password.confirmed' => 'Konfirmasi password salah',
        ];
    }
}
