<?php

namespace Modules\Frontend\Http\Requests\HomeTwo;

use Illuminate\Foundation\Http\FormRequest;

class AppBrandSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title_1' => 'required|string|max:255',
            'title_2' => 'required|string|max:255',
            'title_3' => 'required|string|max:255',
            'image_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'title_1.required' => __('rules.required'),
            'title_1.string' => __('rules.string'),
            'title_1.max' => __('rules.max', ['max' => 255]),
            'title_2.required' => __('rules.required'),
            'title_2.string' => __('rules.string'),
            'title_2.max' => __('rules.max', ['max' => 255]),
            'title_3.required' => __('rules.required'),
            'title_3.string' => __('rules.string'),
            'title_3.max' => __('rules.max', ['max' => 255]),
            'image_1.image' => __('rules.image'),
            'image_1.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image_1.max' => __('rules.file_max', ['max' => 2048]),
            'image_2.image' => __('rules.image'),
            'image_2.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image_2.max' => __('rules.file_max', ['max' => 2048]),
            'image_3.image' => __('rules.image'),
            'image_3.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image_3.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        return [
            'title_1' => __('attribute.title_1'),
            'title_2' => __('attribute.title_2'),
            'title_3' => __('attribute.title_3'),
            'image_1' => __('attribute.image_1'),
            'image_2' => __('attribute.image_2'),
            'image_3' => __('attribute.image_3'),
        ];
    }
}
