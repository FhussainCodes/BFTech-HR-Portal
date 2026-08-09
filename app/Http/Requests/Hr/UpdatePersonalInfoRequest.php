<?php

namespace App\Http\Requests\Hr;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonalInfoRequest extends FormRequest
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

            'first_name' => 'required|min:2|max:20|string|regex:/^[A-Za-z\s]+$/',

            'last_name' => 'required|min:3|max:20|string|regex:/^[A-Za-z\s]+$/',

            'age' => 'required|integer|min:18|max:60',

        ];
    }

    public function messages(): array
    {
        return [

// First Name
            'first_name.required' => __('employee.first_name_required'),
            'first_name.min'      => __('employee.first_name_min'),
            'first_name.max'      => __('employee.first_name_max'),
            'first_name.regex'    => __('employee.first_name_regex'),

            // Last Name
            'last_name.required'  => __('employee.last_name_required'),
            'last_name.min'       => __('employee.last_name_min'),
            'last_name.max'       => __('employee.last_name_max'),
            'last_name.regex'     => __('employee.last_name_regex'),

            // Age
            'age.required'        => __('employee.age_required'),
            'age.integer'         => __('employee.age_integer'),
            'age.min'             => __('employee.age_min'),
            'age.max'             => __('employee.age_max'),

        ];
    }
}
