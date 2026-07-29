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

public function messages(): array
{
    return [

        'email.required' => __('validation.custom.email.required'),
        'email.email'    => __('validation.custom.email.email'),

        'password.required' => __('validation.custom.password.required'),
        'password.min'      => __('validation.custom.password.min'),
        'password.max'      => __('validation.custom.password.max'),

    ];
}
}
