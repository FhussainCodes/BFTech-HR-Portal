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

            'employee.string' => 'Employee name must be a valid string.',
            'employee.max' => 'Employee name cannot exceed 255 characters.',
           

            'from_date.date' => 'Please enter a valid Start Date.',
            'from_date.required_with' => 'Start Date is required when End Date is selected.',

            'to_date.date' => 'Please enter a valid End Date.',
            'to_date.required_with' => 'End Date is required when Start Date is selected.',
            'to_date.after_or_equal' => 'End Date must be greater than or equal to Start Date.',

        ];
    }
}
