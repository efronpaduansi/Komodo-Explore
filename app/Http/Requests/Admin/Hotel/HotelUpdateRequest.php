<?php

namespace App\Http\Requests\Admin\Hotel;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HotelUpdateRequest extends FormRequest
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
            'addName'       => ['required', 'string', 'max:50'],
            'addAddress'    => ['required', 'max:128'],
            'addCity'       => ['required', 'max:100'],
            'addPhone'      => ['required', 'string', 'max:20',   Rule::unique('hotels', 'phone')->ignore($this->id)],
            'addEmail'         => ['required', 'email', Rule::unique('hotels', 'email')->ignore($this->id)],
            'addWebsite'       => ['string', 'url'],
            'addPrice'      => ['required', 'numeric'],
            'addCheckinTime'    => ['required'],
            'addCheckoutTime'    => ['required'],
            'addDescription'    => ['required', 'string'],
        ];
    }

    public function messages()
    {
        return [
            'addImage.required' => 'Gambar harus diunggah.',
            'addImage.image' => 'File harus berupa gambar.',
            'addImage.mimes' => 'Format yang diperbolehkan: .PNG, .JPG, .JPEG.',
            'addImage.max' => 'Ukuran gambar tidak boleh lebih dari 512 KB.',
            'addName.required' => 'Nama Lokasi harus diisi.',
            'addName.string' => 'Nama Lokasi harus berupa teks.',
            'addName.max' => 'Nama Lokasi maksimal 50 karakter.',
            'addAddress.required' => 'Alamat harus diisi.',
            'addAddress.max' => 'Alamat maksimal 128 karakter.',
            'addCity.required' => 'Kota harus diisi.',
            'addCity.max' => 'Kota maksimal 100 karakter.',
            'addPhone.required' => 'Nomor telepon harus diisi.',
            'addPhone.numeric' => 'Nomor telepon harus berupa angka.',
            'addPhone.max' => 'Nomor telepon maksimal 20 karakter.',
            'addPhone.unique' => 'Nomor telepon sudah digunakan.',
            'addEmail.required' => 'Alamat email harus diisi.',
            'addEmail.email' => 'Alamat email tidak valid.',
            'addEmail.unique' => 'Alamat email sudah digunakan.',
            'addWebsite.string' => 'Website harus berupa teks.',
            'addWebsite.url' => 'Format URL tidak valid.',
            'addWebsite.regex' => 'Website harus mengandung kata "example.com".',
            'addPrice.required' => 'Harga harus diisi.',
            'addPrice.numeric' => 'Harga harus berupa angka.',
            'addCheckinTime.required' => 'Waktu check-in harus diisi.',
            'addCheckoutTime.required' => 'Waktu check-out harus diisi.',
            'addDescription.required' => 'Deskripsi harus diisi.',
            'addDescription.string' => 'Deskripsi harus berupa teks.',
        ];
    }

}
