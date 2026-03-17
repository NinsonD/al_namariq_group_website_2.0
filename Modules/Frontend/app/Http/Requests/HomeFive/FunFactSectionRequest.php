<?php

namespace Modules\Frontend\Http\Requests\HomeFive;

use Illuminate\Foundation\Http\FormRequest;

class FunFactSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_6' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_7' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_8' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_9' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_10' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_11' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_12' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_13' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_14' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_15' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'fact_icon_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'fact_icon_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'fact_number_1' => 'nullable|numeric',
            'fact_number_2' => 'nullable|numeric',
            'fact_subtitle_1' => 'nullable|string|max:255',
            'fact_subtitle_2' => 'nullable|string|max:255',
            'fact_subtitle_3' => 'nullable|string|max:255',
            'fact_title_1' => 'nullable|string|max:255',
            'fact_title_2' => 'nullable|string|max:255',
            'fact_title_3' => 'nullable|string|max:255',
            'fact_text' => 'nullable|string|max:255',
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
            'image_1' => __('attribute.image_1'),
            'image_2' => __('attribute.image_2'),
            'image_3' => __('attribute.image_3'),
            'image_4' => __('attribute.image_4'),
            'image_5' => __('attribute.image_5'),
            'image_6' => __('attribute.image_6'),
            'image_7' => __('attribute.image_7'),
            'image_8' => __('attribute.image_8'),
            'image_9' => __('attribute.image_9'),
            'image_10' => __('attribute.image_10'),
            'image_11' => __('attribute.image_11'),
            'image_12' => __('attribute.image_12'),
            'image_13' => __('attribute.image_13'),
            'image_14' => __('attribute.image_14'),
            'image_15' => __('attribute.image_15'),
            'fact_icon_1' => __('attribute.fact_icon_1'),
            'fact_icon_2' => __('attribute.fact_icon_2'),
            'fact_number_1' => __('attribute.fact_number_1'),
            'fact_number_2' => __('attribute.fact_number_2'),
            'fact_subtitle_1' => __('attribute.fact_subtitle_1'),
            'fact_subtitle_2' => __('attribute.fact_subtitle_2'),
            'fact_subtitle_3' => __('attribute.fact_subtitle_3'),
            'fact_title_1' => __('attribute.fact_title_1'),
            'fact_title_2' => __('attribute.fact_title_2'),
            'fact_title_3' => __('attribute.fact_title_3'),
            'fact_text' => __('attribute.fact_text'),
        ];
    }


    public function messages(): array
    {
        return [
            'image_1.image' => __('rules.image'),
            'image_1.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_1.max' => __('rules.file_max', ['max' => 2048]),

            'image_2.image' => __('rules.image'),
            'image_2.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_2.max' => __('rules.file_max', ['max' => 2048]),

            'image_3.image' => __('rules.image'),
            'image_3.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_3.max' => __('rules.file_max', ['max' => 2048]),

            'image_4.image' => __('rules.image'),
            'image_4.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_4.max' => __('rules.file_max', ['max' => 2048]),

            'image_5.image' => __('rules.image'),
            'image_5.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_5.max' => __('rules.file_max', ['max' => 2048]),

            'image_6.image' => __('rules.image'),
            'image_6.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_6.max' => __('rules.file_max', ['max' => 2048]),

            'image_7.image' => __('rules.image'),
            'image_7.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_7.max' => __('rules.file_max', ['max' => 2048]),

            'image_8.image' => __('rules.image'),
            'image_8.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_8.max' => __('rules.file_max', ['max' => 2048]),

            'image_9.image' => __('rules.image'),
            'image_9.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_9.max' => __('rules.file_max', ['max' => 2048]),

            'image_10.image' => __('rules.image'),
            'image_10.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_10.max' => __('rules.file_max', ['max' => 2048]),

            'image_11.image' => __('rules.image'),
            'image_11.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_11.max' => __('rules.file_max', ['max' => 2048]),

            'image_12.image' => __('rules.image'),
            'image_12.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_12.max' => __('rules.file_max', ['max' => 2048]),

            'image_13.image' => __('rules.image'),
            'image_13.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_13.max' => __('rules.file_max', ['max' => 2048]),

            'image_14.image' => __('rules.image'),
            'image_14.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_14.max' => __('rules.file_max', ['max' => 2048]),

            'image_15.image' => __('rules.image'),
            'image_15.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image_15.max' => __('rules.file_max', ['max' => 2048]),

            'fact_icon_1.image' => __('rules.image'),
            'fact_icon_1.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'fact_icon_1.max' => __('rules.file_max', ['max' => 2048]),

            'fact_icon_2.image' => __('rules.image'),
            'fact_icon_2.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'fact_icon_2.max' => __('rules.file_max', ['max' => 2048]),

            'fact_number_1.numeric' => __('rules.numeric'),

            'fact_number_2.numeric' => __('rules.numeric'),

            'fact_subtitle_1.string' => __('rules.string'),
            'fact_subtitle_1.max' => __('rules.max', ['max' => 255]),

            'fact_subtitle_2.string' => __('rules.string'),
            'fact_subtitle_2.max' => __('rules.max', ['max' => 255]),

            'fact_subtitle_3.string' => __('rules.string'),
            'fact_subtitle_3.max' => __('rules.max', ['max' => 255]),

            'fact_title_1.string' => __('rules.string'),
            'fact_title_1.max' => __('rules.max', ['max' => 255]),

            'fact_title_2.string' => __('rules.string'),
            'fact_title_2.max' => __('rules.max', ['max' => 255]),

            'fact_title_3.string' => __('rules.string'),
            'fact_title_3.max' => __('rules.max', ['max' => 255]),

            'fact_text.string' => __('rules.string'),
            'fact_text.max' => __('rules.max', ['max' => 255]),
        ];
    }
}
