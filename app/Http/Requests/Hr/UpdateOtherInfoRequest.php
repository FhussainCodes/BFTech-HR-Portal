<?php

namespace App\Http\Requests\Hr;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateOtherInfoRequest extends FormRequest
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
        'city'    => 'required|string|min:3|max:20|regex:/^[A-Za-z\s]+$/',
        'country' => 'required|string|min:2|max:25|regex:/^[A-Za-z\s]+$/',
        ];
    }

    public function messages(): array
{
    return [
        'city.required' => 'City is required.',
        'city.string' => 'City must be a string.',
        'city.min' => 'City must be at least 3 characters.',
        'city.max' => 'City may not be greater than 20 characters.',
        'city.regex' => 'City may only contain letters and spaces.',

        'country.required' => 'Country is required.',
        'country.string' => 'Country must be a string.',
        'country.min' => 'Country must be at least 2 characters.',
        'country.max' => 'Country may not be greater than 25 characters.',
        'country.regex' => 'Country may only contain letters and spaces.',
    ];
}
}
