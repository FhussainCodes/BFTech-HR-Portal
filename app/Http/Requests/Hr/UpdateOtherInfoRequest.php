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
'city.required' => __('employee.city_required'),
            'city.string'   => __('employee.city_string'),
            'city.min'      => __('employee.city_min'),
            'city.max'      => __('employee.city_max'),
            'city.regex'    => __('employee.city_regex'),

            // Country
            'country.required' => __('employee.country_required'),
            'country.string'   => __('employee.country_string'),
            'country.min'      => __('employee.country_min'),
            'country.max'      => __('employee.country_max'),
            'country.regex'    => __('employee.country_regex'),
    ];
}
}
