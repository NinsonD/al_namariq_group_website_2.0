<?php

namespace Modules\Frontend\Http\Requests\HomeSix;

use Illuminate\Foundation\Http\FormRequest;

class HeroSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subtitle' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'btn_text' => 'nullable|string|max:255',
            'people_title' => 'nullable|string|max:255',
            'people_number' => 'nullable|string|max:255',
            'btn_url' => 'nullable|string|max:255',
            'bg_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_6' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_7' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
            'subtitle' => __('attribute.subtitle'),
            'title' => __('attribute.title'),
            'btn_text' => __('attribute.btn_text'),
            'people_title' => __('attribute.people_title'),
            'people_number' => __('attribute.people_number'),
            'btn_url' => __('attribute.btn_url'),
            'bg_image' => __('attribute.bg_image'),
            'image_1' => __('attribute.image_1'),
            'image_2' => __('attribute.image_2'),
            'image_3' => __('attribute.image_3'),
            'image_4' => __('attribute.image_4'),
            'image_5' => __('attribute.image_5'),
            'image_6' => __('attribute.image_6'),
            'image_7' => __('attribute.image_7'),
        ];
    }

    public function messages(): array
    {
        return [
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),

            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),

            'btn_text.string' => __('rules.string'),
            'btn_text.max' => __('rules.max', ['max' => 255]),

            'people_title.string' => __('rules.string'),
            'people_title.max' => __('rules.max', ['max' => 255]),

            'people_number.string' => __('rules.string'),
            'people_number.max' => __('rules.max', ['max' => 255]),

            'btn_url.string' => __('rules.string'),
            'btn_url.max' => __('rules.max', ['max' => 255]),

            'bg_image.image' => __('rules.image'),
            'bg_image.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'bg_image.max' => __('rules.file_max', ['max' => 2048]),

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
        ];
    }

}
