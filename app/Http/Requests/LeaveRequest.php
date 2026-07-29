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

        'leave_type.required' => __('validation.custom.leave_type.required'),

        'from_date.required' => __('validation.custom.from_date.required'),
        'from_date.date' => __('validation.custom.from_date.date'),
        'from_date.after_or_equal' => __('validation.custom.from_date.after_or_equal'),

        'to_date.required' => __('validation.custom.to_date.required'),
        'to_date.date' => __('validation.custom.to_date.date'),
        'to_date.after_or_equal' => __('validation.custom.to_date.after_or_equal'),

    ];
}
}
