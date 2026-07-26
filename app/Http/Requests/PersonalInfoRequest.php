<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PersonalInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:3|max:20|regex:/^[A-Za-z\s]+$/',
            'last_name' => 'nullable|string|min:3|max:35|regex:/^[A-Za-z\s]+$/',
            'age' => 'required|integer|between:15,70',
        ];
    }
}
