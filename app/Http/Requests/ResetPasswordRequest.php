<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'password' => 'required|min:6|max:64|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'confirm_password' => 'required|same:password',
        ];
    }

        public function messages(): array
    {
        return [
            // Password Messages
            'password.required'    => 'A password is required.',
            'password.min'         => 'Your password must be at least 6 characters long.',
            'password.max'         => 'Your password cannot exceed 64 characters.',
            'password.regex'       => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character (@$!%*?&).',

            // Confirm Password Messages
            'confirm_password.required' => 'Please confirm your password.',
            'confirm_password.same'     => 'Confirm password does not match the new password.', 
        ];
    }
}
