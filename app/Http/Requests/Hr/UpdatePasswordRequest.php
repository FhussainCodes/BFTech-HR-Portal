<?php

namespace App\Http\Requests\Hr;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
        'password.required' => 'Password is required.',
        'password.min' => 'Password must be at least 6 characters.',
        'password.max' => 'Password may not be greater than 64 characters.',
        'password.regex' => 'Password must contain at least one uppercase letter (A-Z), one lowercase letter (a-z), one number (0-9) and one special character (@$!%*?&).',
        'confirm_password.required' => 'Confirm password is required.',
        'confirm_password.same' => 'Confirm password does not match the password.',
    ];
}
}
