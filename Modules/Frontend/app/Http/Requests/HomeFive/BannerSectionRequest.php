<?php

namespace Modules\Frontend\Http\Requests\HomeFive;

use Illuminate\Foundation\Http\FormRequest;

class BannerSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'main_image' => __('attribute.main_image'),
        ];
    }

    public function messages(): array
    {
        return [
            'main_image.image' => __('rules.image'),
            'main_image.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'main_image.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }
}
