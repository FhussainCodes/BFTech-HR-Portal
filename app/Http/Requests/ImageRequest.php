<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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

    public function messages(): array{
        return [
            'profile_image.required' => 'Please upload a profile image.',
            'profile_image.image'    => 'The profile image must be a valid image file.',
            'profile_image.mimes'    => 'Allowed image formats are: JPG, JPEG, or PNG,WEBP.',
            'profile_image.max'      => 'The profile image size must not exceed 2 MB.',
        ];
}
}
