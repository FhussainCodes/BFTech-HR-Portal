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
            'search.string' => 'Search value must be a valid text.',
            'search.min' => 'Search must contain at least 2 characters.',
            'search.max' => 'Search cannot exceed 40 characters.',
            'search.regex' => 'Only letters, numbers and spaces are allowed.'
        ];
    }
}
