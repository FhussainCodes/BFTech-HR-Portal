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

            'first_name.required' => 'First name is required.',
            'first_name.min' => 'First name must be at least 2 characters.',
            'first_name.max' => 'First name may not be greater than 20 characters.',

            'last_name.required' => 'Last name is required.',
            'last_name.min' => 'Last name must be at least 3 characters.',
            'last_name.max' => 'Last name may not be greater than 20 characters.',

            'age.required' => 'Age is required.',
            'age.integer' => 'Age must be a number.',
            'age.min' => 'Minimum age is 18.',
            'age.max' => 'Maximum age is 60.',

        ];
    }
}
