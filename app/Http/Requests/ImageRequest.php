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

public function messages(): array
{
    return [

        'profile_image.required' => __('validation.custom.profile_image.required'),
        'profile_image.image'    => __('validation.custom.profile_image.image'),
        'profile_image.mimes'    => __('validation.custom.profile_image.mimes'),
        'profile_image.max'      => __('validation.custom.profile_image.max'),

    ];
}
}
