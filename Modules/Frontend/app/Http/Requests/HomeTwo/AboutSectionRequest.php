<?php

namespace Modules\Frontend\Http\Requests\HomeTwo;

use Illuminate\Foundation\Http\FormRequest;

class AboutSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'btn_text' => 'nullable|string|max:255',
            'btn_url' => 'nullable|string|max:255',
            'counter_title_1' => 'nullable|string|max:255',
            'counter_number_1' => 'nullable|numeric',
            'counter_unit_1' => 'nullable|string|max:255',
            'counter_title_2' => 'nullable|string|max:255',
            'counter_number_2' => 'nullable|numeric',
            'counter_unit_2' => 'nullable|string|max:255',
            'image_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bg_shape_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bg_shape_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
            'subtitle.required' => __('rules.required'),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'description.string' => __('rules.string'),
            'btn_text.string' => __('rules.string'),
            'btn_text.max' => __('rules.max', ['max' => 255]),
            'btn_url.max' => __('rules.max', ['max' => 255]),
            'counter_title_1.string' => __('rules.string'),
            'counter_title_1.max' => __('rules.max', ['max' => 255]),
            'counter_number_1.numeric' => __('rules.numeric'),
            'counter_unit_1.string' => __('rules.string'),
            'counter_unit_1.max' => __('rules.max', ['max' => 255]),
            'counter_title_2.string' => __('rules.string'),
            'counter_title_2.max' => __('rules.max', ['max' => 255]),
            'counter_number_2.numeric' => __('rules.numeric'),
            'counter_unit_2.string' => __('rules.string'),
            'counter_unit_2.max' => __('rules.max', ['max' => 255]),
            'image_1.image' => __('rules.image'),
            'image_1.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image_1.max' => __('rules.file_max', ['max' => 2048]),
            'image_2.image' => __('rules.image'),
            'image_2.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image_2.max' => __('rules.file_max', ['max' => 2048]),
            'image_3.image' => __('rules.image'),
            'image_3.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image_3.max' => __('rules.file_max', ['max' => 2048]),
            'bg_shape_1.image' => __('rules.image'),
            'bg_shape_1.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'bg_shape_1.max' => __('rules.file_max', ['max' => 2048]),
            'bg_shape_2.image' => __('rules.image'),
            'bg_shape_2.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'bg_shape_2.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        return [
            'subtitle' => __('attribute.subtitle'),
            'title' => __('attribute.title'),
            'description' => __('attribute.description'),
            'btn_text' => __('attribute.btn_text'),
            'btn_url' => __('attribute.btn_url'),
            'counter_title_1' => __('attribute.counter_title_1'),
            'counter_number_1' => __('attribute.counter_number_1'),
            'counter_unit_1' => __('attribute.counter_unit_1'),
            'counter_title_2' => __('attribute.counter_title_2'),
            'counter_number_2' => __('attribute.counter_number_2'),
            'counter_unit_2' => __('attribute.counter_unit_2'),
            'image_1' => __('attribute.image_1'),
            'image_2' => __('attribute.image_2'),
            'image_3' => __('attribute.image_3'),
            'bg_shape_1' => __('attribute.bg_shape_1'),
            'bg_shape_2' => __('attribute.bg_shape_2'),
        ];
    }
}
