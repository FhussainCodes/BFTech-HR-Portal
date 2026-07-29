<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
    public function rules(): array{
    return [

        'first_name' => 'required|string|min:3|max:20|regex:/^[A-Za-z\s]+$/',
        'last_name' => 'required|string|min:3|max:35|regex:/^[A-Za-z\s]+$/',
        'email' => 'required|email|unique:register|ends_with:@gmail.com',
        'age' => 'required|integer|between:15,70',
        'designation' => 'required|string|min:2|max:30|regex:/^[A-Za-z\s]+$/',
        'phone_number' => 'required|regex:/^(03[0-9]{2}[0-9]{7})$/',
        'city' => 'required|string|min:3|max:20|regex:/^[A-Za-z\s]+$/',
        'country' => 'required|string|min:2|max:25|regex:/^[A-Za-z\s]+$/',
        'password' => 'required|min:6|max:64|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        'confirm_password' => 'required|same:password',
       ];
    }

   public function messages(): array
{
    return [

        // First Name
        'first_name.required' => __('validation.custom.first_name.required'),
        'first_name.min'      => __('validation.custom.first_name.min'),
        'first_name.max'      => __('validation.custom.first_name.max'),
        'first_name.regex'    => __('validation.custom.first_name.regex'),

        // Last Name
        'last_name.required'  => __('validation.custom.last_name.required'),
        'last_name.min'       => __('validation.custom.last_name.min'),
        'last_name.max'       => __('validation.custom.last_name.max'),
        'last_name.regex'     => __('validation.custom.last_name.regex'),

        // Email
        'email.required'      => __('validation.custom.email.required'),
        'email.email'         => __('validation.custom.email.email'),
        'email.unique'        => __('validation.custom.email.unique'),

        // Age
        'age.required'        => __('validation.custom.age.required'),
        'age.integer'         => __('validation.custom.age.integer'),
        'age.between'         => __('validation.custom.age.between'),

        // Designation
        'designation.required' => __('validation.custom.designation.required'),
        'designation.min'      => __('validation.custom.designation.min'),
        'designation.max'      => __('validation.custom.designation.max'),
        'designation.regex'    => __('validation.custom.designation.regex'),

        // Phone
        'phone_number.required' => __('validation.custom.phone_number.required'),
        'phone_number.regex'    => __('validation.custom.phone_number.regex'),

        // City
        'city.required'       => __('validation.custom.city.required'),
        'city.min'            => __('validation.custom.city.min'),
        'city.max'            => __('validation.custom.city.max'),
        'city.regex'          => __('validation.custom.city.regex'),

        // Country
        'country.required'    => __('validation.custom.country.required'),
        'country.min'         => __('validation.custom.country.min'),
        'country.max'         => __('validation.custom.country.max'),
        'country.regex'       => __('validation.custom.country.regex'),

        // Password
        'password.required'   => __('validation.custom.password.required'),
        'password.min'        => __('validation.custom.password.min'),
        'password.max'        => __('validation.custom.password.max'),
        'password.regex'      => __('validation.custom.password.regex'),

        // Confirm Password
        'confirm_password.required' => __('validation.custom.confirm_password.required'),
        'confirm_password.same'     => __('validation.custom.confirm_password.same'),

    ];
}
}
