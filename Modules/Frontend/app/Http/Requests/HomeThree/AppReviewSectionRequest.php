<?php

namespace Modules\Frontend\Http\Requests\HomeThree;

use Illuminate\Foundation\Http\FormRequest;

class AppReviewSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'title_2' => 'required|string|max:255',
            'item_title_1' => 'required|string|max:255',
            'item_title_2' => 'required|string|max:255',
            'item_subtitle_1' => 'nullable|string|max:255',
            'item_subtitle_2' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'icon_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'icon_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
            'title_2.required' => __('rules.required'),
            'title_2.string' => __('rules.string'),
            'title_2.max' => __('rules.max', ['max' => 255]),
            'item_title_1.required' => __('rules.required'),
            'item_title_1.string' => __('rules.string'),
            'item_title_1.max' => __('rules.max', ['max' => 255]),
            'item_title_2.required' => __('rules.required'),
            'item_title_2.string' => __('rules.string'),
            'item_title_2.max' => __('rules.max', ['max' => 255]),
            'item_subtitle_1.string' => __('rules.string'),
            'item_subtitle_1.max' => __('rules.max', ['max' => 255]),
            'item_subtitle_2.string' => __('rules.string'),
            'item_subtitle_2.max' => __('rules.max', ['max' => 255]),
            'main_image.image' => __('rules.image'),
            'main_image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'main_image.max' => __('rules.file_max', ['max' => 2048]),
            'image_2.image' => __('rules.image'),
            'image_2.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image_2.max' => __('rules.file_max', ['max' => 2048]),
            'icon_1.image' => __('rules.image'),
            'icon_1.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'icon_1.max' => __('rules.file_max', ['max' => 2048]),
            'icon_2.image' => __('rules.image'),
            'icon_2.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'icon_2.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        return [
            'subtitle' => __('attribute.subtitle'),
            'title' => __('attribute.title'),
            'title_2' => __('attribute.title_2'),
            'item_title_1' => __('attribute.item_title_1'),
            'item_title_2' => __('attribute.item_title_2'),
            'item_subtitle_1' => __('attribute.item_subtitle_1'),
            'item_subtitle_2' => __('attribute.item_subtitle_2'),
            'main_image' => __('attribute.main_image'),
            'image_2' => __('attribute.image_2'),
            'icon_1' => __('attribute.icon_1'),
            'icon_2' => __('attribute.icon_2'),
        ];
    }
}
