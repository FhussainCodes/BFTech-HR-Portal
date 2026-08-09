<?php

namespace App\Http\Requests\Hr;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDesignationRequest extends FormRequest
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
        'designation' => 'required|string|min:2|max:30|regex:/^[A-Za-z\s]+$/',
        ];
    }
    
    public function messages(): array
{
    return [
'designation.required' => __('employee.designation_required'),
            'designation.string'   => __('employee.designation_string'),
            'designation.min'      => __('employee.designation_min'),
            'designation.max'      => __('employee.designation_max'),
            'designation.regex'    => __('employee.designation_regex'),
    ];
}        
}
