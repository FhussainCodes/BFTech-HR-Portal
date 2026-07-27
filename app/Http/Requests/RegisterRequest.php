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

    public function messages(): array{
        return [

             // First Name Rules Messages
            'first_name.required'   => 'You forgot to type your first name.',
            'first_name.min'        => 'Names must be 3 or more characters.',
            'first_name.max'        => 'Names must be 20 or fewer characters.',
            'first_name.regex'      => 'First name can contain only letters and spaces.',

            // 'last_name.required' => 'Last name is required.',
            'last_name.min'         => 'Last name must be at least 2 characters.',
            'last_name.max'         => 'Last name cannot exceed 35 characters.',
            'last_name.regex'       => 'Last name can contain only letters and spaces.',
            'last_name.required' => 'Last name is required.',

            // Email Messages
            'email.required'       => 'An email address is required.',
            'email.email'          => 'Please provide a valid email format.',
            'email.unique'         => 'This email address is already taken.',

            // Age Messages
            'age.required'          => 'Your age is required.',
            'age.integer'           => 'Age must be a number.',
            'age.between'           => 'Age must be between 15 and 70 years.',

            // Designation Messages
            'designation.required' => 'A job designation is required.',
            'designation.min'      => 'Designation must be at least 2 characters.',
            'designation.max'      => 'Designation cannot exceed 30 characters.',
            'designation.regex'    => 'Designation can contain only letters and spaces.',

            // Phone Number Messages
            'phone_number.required' => 'Please provide your phone number.',
            'phone_number.regex'    => 'Please enter a valid Pakistani mobile number (e.g. 03001234567).',

            // City Messages
            'city.required'        => 'The city field is required.',
            'city.min'             => 'City name must be at least 3 characters.',
            'city.max'             => 'City name cannot exceed 20 characters.',
            'city.regex'           => 'City can contain only letters and spaces.',
            

            // Country Messages
            'country.required'     => 'The country field is required.',
            'country.min'          => 'Country name must be at least 3 characters.',
            'country.max'          => 'Country name cannot exceed 25 characters.',
            'country.regex'        => 'Country can contain only letters and spaces.',
            

            // Password Messages
            'password.required'    => 'A password is required.',
            'password.min'         => 'Your password must be at least 6 characters long.',
            'password.max'         => 'Your password cannot exceed 64 characters.',
            'password.regex'       => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*?&).',

            // Confirm Password Messages
            'confirm_password.required' => 'Please confirm your password.',
            'confirm_password.same'     => 'The confirmation password does not match the chosen password.',       
        ];
    }
}
