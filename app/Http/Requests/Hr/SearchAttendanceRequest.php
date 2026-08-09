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
'employee_name.string'    => __('attendance.employee_name_string'),
            'employee_name.min'       => __('attendance.employee_name_min'),
            'employee_name.max'       => __('attendance.employee_name_max'),
            'employee_name.regex'     => __('attendance.employee_name_regex'),

            // Start Date
            'start_date.date'         => __('attendance.start_date_invalid'),

            // End Date
            'end_date.date'           => __('attendance.end_date_invalid'),
            'end_date.after_or_equal' => __('attendance.end_date_after_or_equal'),

    ];
}
}
