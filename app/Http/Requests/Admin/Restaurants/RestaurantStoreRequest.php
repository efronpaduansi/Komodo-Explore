<?php

namespace App\Http\Requests\Admin\Restaurants;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantStoreRequest extends FormRequest
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
            'addImage'      => ['required', 'image', 'mimes:png,jpg,jpeg', 'max:512'],
            'addName'       => ['required', 'string', 'max:100'],
            'addAddress'    => ['required', 'string', 'max:128'],
            'addCity'       => ['required', 'string', 'max:100'],
            'addPhone'      => ['required', 'string', 'unique:restaurants,phone', 'max:20'],
            'addEmail'      => ['required', 'email', 'unique:restaurants,email', 'max:50'],
            'addOpeningHours'=> ['required'],
            'addDescription'=> ['required', 'string', 'max:128'],
        ];
    }

    public function messages()
    {
        return [
            'addImage.required' => 'Gambar harus diunggah.',
            'addImage.image' => 'File harus berupa gambar.',
            'addImage.mimes' => 'Format yang diperbolehkan: PNG, JPG, JPEG.',
            'addImage.max' => 'Ukuran gambar tidak boleh lebih dari 512 KB.',
            'addName.required' => 'Nama harus diisi.',
            'addName.string' => 'Nama harus berupa teks.',
            'addName.max' => 'Nama maksimal 100 karakter.',
            'addAddress.required' => 'Alamat harus diisi.',
            'addAddress.string' => 'Alamat harus berupa teks.',
            'addAddress.max' => 'Alamat maksimal 128 karakter.',
            'addCity.required' => 'Kota harus diisi.',
            'addCity.string' => 'Kota harus berupa teks.',
            'addCity.max' => 'Kota maksimal 100 karakter.',
            'addPhone.required' => 'Nomor telepon harus diisi.',
            'addPhone.string' => 'Nomor telepon harus berupa teks.',
            'addPhone.unique' => 'Nomor telepon sudah digunakan.',
            'addPhone.max' => 'Nomor telepon maksimal 20 karakter.',
            'addEmail.required' => 'Alamat email harus diisi.',
            'addEmail.email' => 'Alamat email tidak valid.',
            'addEmail.unique' => 'Alamat email sudah digunakan.',
            'addEmail.max' => 'Alamat email maksimal 50 karakter.',
            'addOpeningHours.required' => 'Jam buka harus diisi.',
            'addOpeningHours.time' => 'Format jam buka tidak valid.',
            'addDescription.required' => 'Deskripsi harus diisi.',
            'addDescription.string' => 'Deskripsi harus berupa teks.',
            'addDescription.max' => 'Deskripsi maksimal 128 karakter.',
        ];
    }


}
