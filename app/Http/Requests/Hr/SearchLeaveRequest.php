<?php

namespace App\Http\Requests\Hr;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SearchLeaveRequest extends FormRequest
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

            'employee' => 'nullable|string|max:255',

            'from_date' => 'nullable|date|required_with:to_date',

            'to_date' => 'nullable|date|required_with:from_date|after_or_equal:to_date',

        ];
    }

        public function messages(): array
    {
        return [

'employee.string'         => __('leave.employee_string'),
            'employee.max'            => __('leave.employee_max'),

            // From Date
            'from_date.date'          => __('leave.from_date_invalid'),
            'from_date.required_with' => __('leave.from_date_required_with'),

            // To Date
            'to_date.date'            => __('leave.to_date_invalid'),
            'to_date.required_with'   => __('leave.to_date_required_with'),
            'to_date.after_or_equal'  => __('leave.to_date_after_or_equal'),

        ];
    }
}
