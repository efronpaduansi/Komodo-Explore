<?php

namespace App\Http\Requests\Admin\Location;

use Illuminate\Foundation\Http\FormRequest;

class LocationUpdateRequest extends FormRequest
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
            'locationName'          => 'required|max:100',
            'locationThumbnail'     => 'image|mimes:png,jpg,jpeg|max:512',
            'locationDescription'   => 'required',
            'locationStatus'        => 'required',
        ];
    }

    public function messages()
    {
        return [
          'LocationName.max'        => 'Nama Lokasi maksimal 100 karakter',
          'locationThumbnail.image'  => 'Format gambar salah',
          'locationThumbnail.mimes' => 'Format yang diperbolehkan: .PNG,.JPG,.JPEG',
        ];
    }
}
