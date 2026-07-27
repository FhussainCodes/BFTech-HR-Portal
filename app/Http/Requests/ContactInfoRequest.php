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

        // Email
        'email.required' => 'An email address is required.',
        'email.email'    => 'Please provide a valid email address.',
        'email.unique'   => 'This email address is already in use.',

        // Phone
        'phone_number.required' => 'Please provide your phone number.',
        'phone_number.regex'    => 'Please enter a valid Pakistani mobile number (e.g. 03001234567).',
    ];
}
}
