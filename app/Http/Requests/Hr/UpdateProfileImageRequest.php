<?php

namespace App\Http\Requests\HR;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileImageRequest extends FormRequest
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
            'profile_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function messages(): array
{
    return [
        'profile_image.required' => 'Profile image is required.',
        'profile_image.image' => 'Please upload a valid image.',
        'profile_image.mimes' => 'Image must be a JPG, JPEG or PNG file.',
        'profile_image.max' => 'Image size may not be greater than 2 MB.',
    ];
}
}
