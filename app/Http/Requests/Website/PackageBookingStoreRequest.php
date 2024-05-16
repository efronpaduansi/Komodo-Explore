<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class PackageBookingStoreRequest extends FormRequest
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
            'fullname'          => ['required', 'string', 'max:100'],
            'email'             => ['required', 'email', 'email:dns'],
            'phone'             => ['required', 'string', 'max:20'],
            'address'           => ['required', 'max:100'],
            'city'              => ['required', 'max:100'],
            'country'           => ['required', 'max:100'],
            'date'              => ['required', 'date'],
            'participant'       => ['required', 'numeric', 'min:1'],
        ];
    }
}
