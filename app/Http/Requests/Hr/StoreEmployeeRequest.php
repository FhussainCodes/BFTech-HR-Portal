<?php

namespace App\Http\Requests\HR;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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

            'first_name' => 'required|min:3|max:20',

            'last_name' => 'required|min:3|max:20',

            'email' => 'required|email|unique:register,email',

            'age' => 'required|integer|min:18|max:60',

            'designation' => 'required|min:3|max:50',

            'phone_number' => 'required|digits:11',

            'city' => 'required|min:3|max:30',

            'country' => 'required|min:3|max:30',

            'password' => 'required|min:8|max:20',

            'confirm_password' => 'required|same:password',

            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [

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

            // Phone Number
            'phone_number.required'     => __('employee.phone_required'),
            'phone_number.digits'       => __('employee.phone_digits'),

            // Location
            'city.required'             => __('employee.city_required'),
            'country.required'          => __('employee.country_required'),

            // Password
            'password.required'         => __('employee.password_required'),
            'password.min'              => __('employee.password_min'),
            'password.max'              => __('employee.password_max'),

            // Confirm Password
            'confirm_password.required' => __('employee.confirm_password_required'),
            'confirm_password.same'     => __('employee.confirm_password_same'),

            // Profile Image
            'profile_image.image'       => __('employee.profile_image_invalid'),
            'profile_image.mimes'       => __('employee.profile_image_mimes'),
            'profile_image.max'         => __('employee.profile_image_max'),

            // Role
            'role.required'             => __('employee.role_required'),
            'role.in'                   => __('employee.role_invalid'),

        ];
    }
}
