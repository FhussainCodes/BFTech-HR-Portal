<?php

namespace App\Http\Requests\Hr;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SearchEmployeeRequest extends FormRequest
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
            'search' => 'nullable|string|min:2|max:40|regex:/^[A-Za-z0-9\s]+$/'
        ];
    }
        
    public function messages(): array
    {
        return [
'search.string' => __('employee.search_string'),
            'search.min'    => __('employee.search_min'),
            'search.max'    => __('employee.search_max'),
            'search.regex'  => __('employee.search_regex'),
        ];
    }
}
