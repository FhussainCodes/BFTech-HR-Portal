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

            'first_name.required' => 'First name is required.',
            'first_name.min' => 'First name must be at least 3 characters.',
            'first_name.max' => 'First name cannot exceed 20 characters.',

            'last_name.required' => 'Last name is required.',
            'last_name.min' => 'Last name must be at least 3 characters.',
            'last_name.max' => 'Last name cannot exceed 20 characters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email already exists.',

            'age.required' => 'Age is required.',
            'age.integer' => 'Age must be a number.',
            'age.min' => 'Age must be at least 18 years.',
            'age.max' => 'Age cannot be greater than 60 years.',

            'designation.required' => 'Designation is required.',

            'phone_number.required' => 'Phone number is required.',
            'phone_number.digits' => 'Phone number must contain exactly 11 digits.',

            'city.required' => 'City is required.',

            'country.required' => 'Country is required.',

            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.max' => 'Password cannot exceed 20 characters.',

            'confirm_password.required' => 'Confirm password is required.',
            'confirm_password.same' => 'Confirm password does not match.',

            'profile_image.image' => 'Please upload a valid image.',
            'profile_image.mimes' => 'Only JPG, JPEG and PNG images are allowed.',
            'profile_image.max' => 'Image size cannot exceed 2MB.',

            'role.required' => 'Role is required.',
            'role.in' => 'Invalid role selected.',

        ];
    }
}
