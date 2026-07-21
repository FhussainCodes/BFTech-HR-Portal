<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6|max:64',
        ];
    }

    public function messages(): array{
        return [

            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',

            'password.required'    => 'A password is required.',
            'password.min'         => 'Your password must be at least 6 characters long.',
            'password.max'         => 'Your password cannot exceed 64 characters.',
        ];
}
}
