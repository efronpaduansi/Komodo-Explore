<?php

namespace App\Http\Requests\Admin\Package;

use Illuminate\Foundation\Http\FormRequest;

class PackageStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'packageImage'  => 'required|image|mimes:png,jpg,jpeg|max:512',
            'packageName'   => 'required|max:255',
            'packageDescription'    => 'required',
            'packageDuration'   => 'required',
            'packagePrice'      => 'required|numeric',
            'packageParticipant'    => 'required|numeric',
            'locations.*' => 'exists:tour_locations,id',
        ];
    }

    //display messages
    public function messages()
    {
        return [
            'packageImage.required'     => 'Gambar tidak boleh kosong!',
            'packageImage.image'        => 'Format gambar salah!',
            'packageImage.max'          => 'Gambar terlalu besar!',
            'packageName.required'               => 'Nama paket tidak boleh kosong!',
            'packageDescription.required'        => 'Deskripsi tidak boleh kosong!',
            'packageDuration.required'           => 'Durasi tidak boleh kosong!',
            'packagePrice.required'             => 'Harga tidak boleh kosong!',
            'packagePrice.numeric'             => 'Harga harus di isi angka!',
            'packageParticipant.required'             => 'Peserta tidak boleh kosong!',
            'packageParticipant.numeric'             => 'Peserta harus di isi angka!',
        ];
    }

}
