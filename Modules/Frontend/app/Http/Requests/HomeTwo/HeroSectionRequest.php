<?php

namespace Modules\Frontend\Http\Requests\HomeTwo;

use Illuminate\Foundation\Http\FormRequest;

class HeroSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'thumb_shape' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bg_shape' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title_shape_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title_shape_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'btn_text' => 'nullable|string|max:255',
            'btn_text_2' => 'nullable|string|max:255',
            'btn_url' => 'nullable|string|max:255',
            'btn_url_2' => 'nullable|string|max:255',
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
            'thumb_shape' => __('attribute.thumb_shape'),
            'bg_shape' => __('attribute.bg_shape'),
            'title_shape_1' => __('attribute.title_shape_1'),
            'title_shape_2' => __('attribute.title_shape_2'),
            'title' => __('attribute.title'),
            'subtitle' => __('attribute.subtitle'),
            'description' => __('attribute.description'),
            'btn_text' => __('attribute.btn_text'),
            'btn_text_2' => __('attribute.btn_text_2'),
            'btn_url' => __('attribute.btn_url'),
            'btn_url_2' => __('attribute.btn_url_2'),
        ];
    }

    public function messages(): array
    {
        return [
            'main_image.image' => __('rules.image'),
            'main_image.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'main_image.max' => __('rules.file_max', ['max' => 2048]),
            'thumb_shape.image' => __('rules.image'),
            'thumb_shape.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'thumb_shape.max' => __('rules.file_max', ['max' => 2048]),
            'bg_shape.image' => __('rules.image'),
            'bg_shape.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'bg_shape.max' => __('rules.file_max', ['max' => 2048]),
            'title_shape_1.image' => __('rules.image'),
            'title_shape_1.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'title_shape_1.max' => __('rules.file_max', ['max' => 2048]),
            'title_shape_2.image' => __('rules.image'),
            'title_shape_2.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'title_shape_2.max' => __('rules.file_max', ['max' => 2048]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 1000]),
            'btn_text.string' => __('rules.string'),
            'btn_text.max' => __('rules.max', ['max' => 255]),
            'btn_text_2.string' => __('rules.string'),
            'btn_text_2.max' => __('rules.max', ['max' => 255]),
            'btn_url.string' => __('rules.string'),
            'btn_url.max' => __('rules.max', ['max' => 255]),
            'btn_url_2.string' => __('rules.string'),
            'btn_url_2.max' => __('rules.max', ['max' => 255]),
        ];
    }
}
