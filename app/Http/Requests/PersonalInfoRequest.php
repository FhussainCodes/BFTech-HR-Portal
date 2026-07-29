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
        'first_name.required' => __('validation.custom.first_name.required'),
        'first_name.min'      => __('validation.custom.first_name.min'),
        'first_name.max'      => __('validation.custom.first_name.max'),
        'first_name.regex'    => __('validation.custom.first_name.regex'),

        // Last Name
        'last_name.required'  => __('validation.custom.last_name.required'),
        'last_name.min'       => __('validation.custom.last_name.min'),
        'last_name.max'       => __('validation.custom.last_name.max'),
        'last_name.regex'     => __('validation.custom.last_name.regex'),

        // Age
        'age.required'        => __('validation.custom.age.required'),
        'age.integer'         => __('validation.custom.age.integer'),
        'age.between'         => __('validation.custom.age.between'),

    ];
}
}
