<?php

namespace App\Http\Requests\Hr;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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

            'first_name' => 'required|string|min:3|max:20',

            'last_name' => 'required|string|min:3|max:35',

            'email' => 'required|email|unique:register,email,' . $this->route('id'),

            'age' => 'required|integer|min:18|max:60',

            'designation' => 'required|string|max:100',

            'phone_number' => 'required|regex:/^03[0-9]{9}$/|unique:register,phone_number,' . $this->route('id'),

            'city' => 'required|string|max:100',

            'country' => 'required|string|max:100',

            'password' => 'nullable|min:8|max:20|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&]).+$/',

            'confirm_password' => 'nullable|same:password',

        ];
    }

    public function messages(): array
    {
        return [

           // First Name
            'first_name.required'       => __('employee.first_name_required'),
            'first_name.min'            => __('employee.first_name_min'),
            'first_name.max'            => __('employee.first_name_max'),

            // Last Name
            'last_name.required'        => __('employee.last_name_required'),
            'last_name.min'             => __('employee.last_name_min'),
            'last_name.max'             => __('employee.last_name_max'),

            // Email
            'email.required'            => __('employee.email_required'),
            'email.email'               => __('employee.email_invalid'),
            'email.unique'              => __('employee.email_unique'),

            // Age
            'age.required'              => __('employee.age_required'),
            'age.integer'               => __('employee.age_integer'),
            'age.min'                   => __('employee.age_min'),
            'age.max'                   => __('employee.age_max'),

            // Designation
            'designation.required'      => __('employee.designation_required'),
            'designation.max'           => __('employee.designation_max'),

            // Phone Number
            'phone_number.required'     => __('employee.phone_required'),
            'phone_number.regex'        => __('employee.phone_regex'),
            'phone_number.unique'       => __('employee.phone_unique'),

            // City & Country
            'city.required'             => __('employee.city_required'),
            'city.max'                  => __('employee.city_max'),
            'country.required'          => __('employee.country_required'),
            'country.max'               => __('employee.country_max'),

            // Password & Confirm Password
            'password.min'              => __('employee.password_min'),
            'password.max'              => __('employee.password_max'),
            'password.regex'            => __('employee.password_regex'),
            'confirm_password.same'     => __('employee.confirm_password_same'),

        ];
    }
}
