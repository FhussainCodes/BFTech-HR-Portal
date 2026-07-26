<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class OtherInfoRequest extends FormRequest
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

        // City
        'city.required' => 'The city field is required.',
        'city.min'      => 'City name must be at least 3 characters.',
        'city.max'      => 'City name cannot exceed 20 characters.',
        'city.regex'    => 'City can contain only letters and spaces.',

        // Country
        'country.required' => 'The country field is required.',
        'country.min'      => 'Country name must be at least 2 characters.',
        'country.max'      => 'Country name cannot exceed 25 characters.',
        'country.regex'    => 'Country can contain only letters and spaces.',

    ];
}
}
