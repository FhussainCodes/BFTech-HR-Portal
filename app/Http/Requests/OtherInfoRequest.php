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
        'city.required' => __('validation.custom.city.required'),
        'city.min'      => __('validation.custom.city.min'),
        'city.max'      => __('validation.custom.city.max'),
        'city.regex'    => __('validation.custom.city.regex'),

        // Country
        'country.required' => __('validation.custom.country.required'),
        'country.min'      => __('validation.custom.country.min'),
        'country.max'      => __('validation.custom.country.max'),
        'country.regex'    => __('validation.custom.country.regex'),

    ];
}
}
