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
'password.required'         => __('profile.password_required'),
            'password.min'              => __('profile.password_min'),
            'password.max'              => __('profile.password_max'),
            'password.regex'            => __('profile.password_regex'),

            // Confirm Password
            'confirm_password.required' => __('profile.confirm_password_required'),
            'confirm_password.same'     => __('profile.confirm_password_same'),
    ];
}
}
