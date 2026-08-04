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

            'first_name.required' => 'First name is required.',
            'first_name.min' => 'First name must be at least 3 characters.',

            'last_name.required' => 'Last name is required.',
            'last_name.min' => 'Last name must be at least 3 characters.',

            'email.required' => 'Email is required.',
            'email.email' => 'Enter a valid email address.',
            'email.regex' => 'Only Gmail addresses are allowed.',
            'email.unique' => 'Email already exists.',

            'age.required' => 'Age is required.',
            'age.min' => 'Employee must be at least 18 years old.',
            'age.max' => 'Maximum age is 60.',

            'designation.required' => 'Designation is required.',

            'phone_number.required' => 'Phone number is required.',
            'phone_number.regex' => 'Phone number must start with 03 and contain 11 digits.',
            'phone_number.unique' => 'Phone number already exists.',

            'city.required' => 'City is required.',

            'country.required' => 'Country is required.',

            'password.min' => 'Password must be at least 8 characters.',
            'password.regex' => 'Password must contain uppercase, lowercase, number and special character.',

            'confirm_password.same' => 'Confirm password does not match.',

        ];
    }
}
