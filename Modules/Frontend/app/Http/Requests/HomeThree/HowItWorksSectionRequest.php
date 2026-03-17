<?php

namespace Modules\Frontend\Http\Requests\HomeThree;

use Illuminate\Foundation\Http\FormRequest;

class HowItWorksSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'bg_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'title_2' => 'required|string|max:255',
            'title_3' => 'required|string|max:255',
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
            'bg_image.image' => __('rules.image'),
            'bg_image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'bg_image.max' => __('rules.file_max', ['max' => 2048]),
            'main_image.image' => __('rules.image'),
            'main_image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'main_image.max' => __('rules.file_max', ['max' => 2048]),
            'shape_1.image' => __('rules.image'),
            'shape_1.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_1.max' => __('rules.file_max', ['max' => 2048]),
            'shape_2.image' => __('rules.image'),
            'shape_2.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_2.max' => __('rules.file_max', ['max' => 2048]),
            'shape_3.image' => __('rules.image'),
            'shape_3.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_3.max' => __('rules.file_max', ['max' => 2048]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'subtitle.required' => __('rules.required'),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 500]),
            'title_2.required' => __('rules.required'),
            'title_2.string' => __('rules.string'),
            'title_2.max' => __('rules.max', ['max' => 255]),
            'title_3.required' => __('rules.required'),
            'title_3.string' => __('rules.string'),
            'title_3.max' => __('rules.max', ['max' => 255]),
        ];
    }

    public function attributes(): array
    {
        return [
            'bg_image' => __('attribute.bg_image'),
            'main_image' => __('attribute.main_image'),
            'shape_1' => __('attribute.shape_1'),
            'shape_2' => __('attribute.shape_2'),
            'shape_3' => __('attribute.shape_3'),
            'title' => __('attribute.title'),
            'subtitle' => __('attribute.subtitle'),
            'description' => __('attribute.description'),
            'title_2' => __('attribute.title_2'),
            'title_3' => __('attribute.title_3'),
        ];
    }
}
