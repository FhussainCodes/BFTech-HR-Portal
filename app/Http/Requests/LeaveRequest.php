<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
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
            'leave_type' => 'required',
            'from_date' => 'required|date|after_or_equal:today',
            'to_date' => 'required|date|after_or_equal:from_date',
            'reason' => 'nullable',
        ];
    }

    public function messages(): array
{
    return [

        'leave_type.required' => 'Please select a leave type.',

        'from_date.required' => 'Please select the leave start date.',
        'from_date.date' => 'Please enter a valid start date.',
        'from_date.after_or_equal' => 'Leave cannot be applied for a past date.',

        'to_date.required' => 'Please select the leave end date.',
        'to_date.date' => 'Please enter a valid end date.',
        'to_date.after_or_equal' => 'The end date must be the same as or after the start date.',

        'reason.string' => 'Reason must be valid text.',
    ];
}
}
