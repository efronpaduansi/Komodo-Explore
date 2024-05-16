<?php

namespace App\Http\Requests\Admin\Payment;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PaymentChannelUpdateRequest extends FormRequest
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
            'logo'              => 'image|mimes:png,jpg,jpeg,svg|max:512',
            'bank_name'         => 'required|string',
            'bank_number'       => ['required', 'numeric', Rule::unique('payment_channels', 'bank_number')->ignore($this->route('id'))],
            'name'              => 'required',
            'status'            => 'required',
        ];
    }

    public function messages()
    {
        return [
            'bank_number.unique' => 'Bank sudah digunakan!',
        ];
    }
}
