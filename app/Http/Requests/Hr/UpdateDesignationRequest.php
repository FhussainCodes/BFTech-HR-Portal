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
        'designation.required' => 'Designation is required.',
        'designation.string' => 'Designation must be a string.',
        'designation.min' => 'Designation must be at least 2 characters.',
        'designation.max' => 'Designation may not be greater than 30 characters.',
        'designation.regex' => 'Designation may only contain letters and spaces.',
    ];
}        
}
