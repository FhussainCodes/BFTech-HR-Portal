<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DesignationInfoRequest extends FormRequest
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

        'designation.required' => 'A job designation is required.',
        'designation.min'      => 'Designation must be at least 2 characters.',
        'designation.max'      => 'Designation cannot exceed 30 characters.',
        'designation.regex'    => 'Designation can contain only letters and spaces.',

    ];
}
}
