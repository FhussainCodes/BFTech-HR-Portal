<?php

namespace App\Http\Requests\Hr;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SearchAttendanceRequest extends FormRequest
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
        'employee_name' => 'nullable|string|min:2|max:40|regex:/^[A-Za-z\s]+$/',
        'start_date'    => 'nullable|date',
        'end_date'      => 'nullable|date|after_or_equal:start_date',
        ];
    }

    public function messages(): array
{
    return [
        'employee_name.string' => 'Employee name must be a valid string.',
        'employee_name.min' => 'Employee name must contain at least 2 characters.',
        'employee_name.max' => 'Employee name may not be greater than 40 characters.',
        'employee_name.regex' => 'Employee name may only contain letters and spaces.',

        'start_date.date' => 'Please select a valid start date.',

        'end_date.date' => 'Please select a valid end date.',
        'end_date.after_or_equal' => 'End date must be after or equal to start date.',

    ];
}
}
