<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactInfoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // dd('request working');
        return [
            'email'        => 'required|email|ends_with:@gmail.com|unique:register,email,' . session('user')['id'],
            'phone_number' => 'required|regex:/^(03[0-9]{2}[0-9]{7})$/',
        ];
    }

public function messages(): array
{
    return [

        'email.required' => __('validation.custom.email.required'),
        'email.email'    => __('validation.custom.email.email'),
        'email.unique'   => __('validation.custom.email.unique'),

        'phone_number.required' => __('validation.custom.phone_number.required'),
        'phone_number.regex'    => __('validation.custom.phone_number.regex'),

    ];
}
}
