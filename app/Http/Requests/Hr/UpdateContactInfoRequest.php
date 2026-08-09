<?php

namespace App\Http\Requests\Hr;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateContactInfoRequest extends FormRequest
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
        return [
            'email'        => 'required|email|ends_with:@gmail.com|unique:register,email,' . session('user')['id'],
            'phone_number' => 'required|regex:/^(03[0-9]{2}[0-9]{7})$/',
        ];
    }

    public function messages(): array
{
    return [

'email.required'        => __('employee.email_required'),
            'email.email'           => __('employee.email_invalid'),
            'email.ends_with'       => __('employee.email_ends_with'),
            'email.unique'          => __('employee.email_unique'),

            // Phone Number
            'phone_number.required' => __('employee.phone_required'),
            'phone_number.regex'    => __('employee.phone_regex'),

    ];
}
}
