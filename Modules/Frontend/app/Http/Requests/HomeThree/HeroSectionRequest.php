<?php

namespace Modules\Frontend\Http\Requests\HomeThree;

use Illuminate\Foundation\Http\FormRequest;

class HeroSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'btn_text' => 'required|string|max:255',
            'btn_text_2' => 'required|string|max:255',
            'btn_url' => 'required|string|max:255',
            'btn_url_2' => 'required|string|max:255',
            'app_title' => 'required|string|max:255',
            'rating' => 'nullable|numeric|min:0|max:10',
            'bg_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bg_image_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'app_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_4' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_5' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'btn_icon' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'subtitle.required' => __('rules.required'),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 500]),
            'btn_text.required' => __('rules.required'),
            'btn_text.string' => __('rules.string'),
            'btn_text.max' => __('rules.max', ['max' => 255]),
            'btn_text_2.required' => __('rules.required'),
            'btn_text_2.string' => __('rules.string'),
            'btn_text_2.max' => __('rules.max', ['max' => 255]),
            'btn_url.required' => __('rules.required'),
            'btn_url.string' => __('rules.string'),
            'btn_url.max' => __('rules.max', ['max' => 255]),
            'btn_url_2.required' => __('rules.required'),
            'btn_url_2.string' => __('rules.string'),
            'btn_url_2.max' => __('rules.max', ['max' => 255]),
            'app_title.required' => __('rules.required'),
            'app_title.string' => __('rules.string'),
            'app_title.max' => __('rules.max', ['max' => 255]),
            'rating.numeric' => __('rules.numeric'),
            'rating.min' => __('rules.min', ['min' => 0]),
            'rating.max' => __('rules.max', ['max' => 10]),
            'bg_image.image' => __('rules.image'),
            'bg_image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'bg_image.max' => __('rules.file_max', ['max' => 2048]),
            'bg_image_2.image' => __('rules.image'),
            'bg_image_2.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'bg_image_2.max' => __('rules.file_max', ['max' => 2048]),
            'main_image.image' => __('rules.image'),
            'main_image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'main_image.max' => __('rules.file_max', ['max' => 2048]),
            'app_image.image' => __('rules.image'),
            'app_image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'app_image.max' => __('rules.file_max', ['max' => 2048]),
            'shape_1.image' => __('rules.image'),
            'shape_1.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_1.max' => __('rules.file_max', ['max' => 2048]),
            'shape_2.image' => __('rules.image'),
            'shape_2.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_2.max' => __('rules.file_max', ['max' => 2048]),
            'shape_3.image' => __('rules.image'),
            'shape_3.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_3.max' => __('rules.file_max', ['max' => 2048]),
            'shape_4.image' => __('rules.image'),
            'shape_4.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_4.max' => __('rules.file_max', ['max' => 2048]),
            'shape_5.image' => __('rules.image'),
            'shape_5.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_5.max' => __('rules.file_max', ['max' => 2048]),
            'btn_icon.image' => __('rules.image'),
            'btn_icon.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'btn_icon.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'subtitle' => __('attribute.subtitle'),
            'description' => __('attribute.description'),
            'btn_text' => __('attribute.btn_text_1'),
            'btn_text_2' => __('attribute.btn_text_2'),
            'btn_url' => __('attribute.btn_url_1'),
            'btn_url_2' => __('attribute.btn_url_2'),
            'app_title' => __('attribute.app_title'),
            'rating' => __('attribute.rating_text'),
            'bg_image' => __('attribute.bg_image'),
            'bg_image_2' => __('attribute.bg_image_2'),
            'main_image' => __('attribute.main_image_bg'),
            'app_image' => __('attribute.app_image'),
            'shape_1' => __('attribute.shape_1'),
            'shape_2' => __('attribute.shape_2'),
            'shape_3' => __('attribute.shape_3'),
            'shape_4' => __('attribute.shape_4'),
            'shape_5' => __('attribute.shape_5'),
            'btn_icon' => __('attribute.btn_icon'),
        ];
    }
}

