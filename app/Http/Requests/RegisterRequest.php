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
    public function rules(): array
    {
        return [
            'first_name' => 'required|min:3|max:20|regex:/^[a-zA-Z0-9\s-_]+$/u',
            'last_name' => 'min:3|max:35|regex:/^[a-zA-Z0-9\s-_]+$/u',
            'email' => 'required|email|unique:users',
            'age' => 'required',
            'designation' => 'required|min:2|max30',
            'phone_number' => 'required|phone:PK',
            'city' => 'required|min:3|max:20|regex:/^[a-zA-Z0-9\s-_]+$/u',
            'country' => 'required|min:3|max:25|regex:/^[a-zA-Z0-9\s-_]+$/u',
            'password' => 'required|min:12|max:64|regex:/^[a-zA-Z0-9\s-_]+$/u',
            'confirm_password' => 'required|confirmed',

        ];
    }

    public function messages(): array{
        return [
             // First Name Rules Messages
            'first_name.required' => 'You forgot to type your first name.',
            'first_name.min'      => 'Names must be 3 or more characters.',
            'first_name.max'      => 'Names must be 20 or fewer characters.',
            'first_name.regex'    => 'Special characters are not allowed in the name.',

             // Last Name  Messages
            // 'last_name.min'             => 'Last name must be at least 3 characters.',
            // 'last_name.max'             => 'Last name cannot exceed 35 characters.',
            // 'last_name.regex'           => 'Last name can only contain letters, numbers, spaces, hyphens, and underscores.',

            // Email Messages
            'email.required'       => 'An email address is required.',
            'email.email'          => 'Please provide a valid email format.',
            'email.unique'         => 'This email address is already taken.',

            // Age Messages
            'age.required'         => 'Your age is required.',
            'age.integer'          => 'Age must be a valid number.',
            'age.min'              => 'Age must be a realistic number greater than 0.',

            // Designation Messages
            'designation.required' => 'A job designation is required.',
            'designation.min'      => 'Designation must be at least 2 characters.',
            'designation.max'      => 'Designation cannot exceed 30 characters.',

            // Phone Number Messages
            'phone_number.required'=> 'Please provide your phone number.',
            'phone_number.phone'   => 'Please enter a valid Pakistani phone number format.',

            // City Messages
            'city.required'        => 'The city field is required.',
            'city.min'             => 'City name must be at least 3 characters.',
            'city.max'             => 'City name cannot exceed 20 characters.',
            'city.regex'           => 'City can only contain letters, numbers, spaces, hyphens, and underscores.',

            // Country Messages
            'country.required'     => 'The country field is required.',
            'country.min'          => 'Country name must be at least 3 characters.',
            'country.max'          => 'Country name cannot exceed 25 characters.',
            'country.regex'        => 'Country can only contain letters, numbers, spaces, hyphens, and underscores.',

            // Password Messages
            'password.required'    => 'A password is required.',
            'password.min'         => 'Your password must be at least 12 characters long.',
            'password.max'         => 'Your password cannot exceed 64 characters.',
            'password.regex'       => 'Password can only contain letters, numbers, spaces, hyphens, and underscores.',

            // Confirm Password Messages
            'confirm_password.required' => 'Please confirm your password.',
            'confirm_password.same'     => 'The confirmation password does not match the chosen password.',
            
        ];
    }
}
