<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PersonalInfoRequest extends FormRequest
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
            'first_name' => 'required|string|min:3|max:20|regex:/^[A-Za-z\s]+$/',
            'last_name' => 'required|string|min:3|max:35|regex:/^[A-Za-z\s]+$/',
            'age' => 'required|integer|between:15,70',
        ];
    }

    public function messages(): array
{
    return [

        // First Name
        'first_name.required' => 'You forgot to type your first name.',
        'first_name.min'      => 'First name must be at least 3 characters.',
        'first_name.max'      => 'First name cannot exceed 20 characters.',
        'first_name.regex'    => 'First name can contain only letters and spaces.',

        // Last Name
        'last_name.min'       => 'Last name must be at least 2 characters.',
        'last_name.max'       => 'Last name cannot exceed 35 characters.',
        'last_name.regex'     => 'Last name can contain only letters and spaces.',
        'last_name.required'  => 'Last name is required.',

        // Age
        'age.required'        => 'Your age is required.',
        'age.integer'         => 'Age must be a valid number.',
        'age.between'         => 'Age must be between 15 and 70 years.',
    ];
}
}
