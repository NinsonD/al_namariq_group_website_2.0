<?php

namespace Modules\Frontend\Http\Requests\HomeSix;

use Illuminate\Foundation\Http\FormRequest;

class ServicesSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'info_text' => 'nullable|string|max:255',
            'service_title_1' => 'nullable|string|max:255',
            'service_title_2' => 'nullable|string|max:255',
            'service_title_3' => 'nullable|string|max:255',
            'service_title_4' => 'nullable|string|max:255',
            'service_url_1' => 'nullable|string|max:255',
            'service_url_2' => 'nullable|string|max:255',
            'service_url_3' => 'nullable|string|max:255',
            'service_url_4' => 'nullable|string|max:255',
            'service_image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'service_image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'service_image_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'service_image_4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',

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
            'title' => __('attribute.title'),
            'description' => __('attribute.description'),
            'info_text' => __('attribute.info_text'),
            'service_title_1' => __('attribute.service_title_1'),
            'service_title_2' => __('attribute.service_title_2'),
            'service_title_3' => __('attribute.service_title_3'),
            'service_title_4' => __('attribute.service_title_4'),
            'service_url_1' => __('attribute.service_url_1'),
            'service_url_2' => __('attribute.service_url_2'),
            'service_url_3' => __('attribute.service_url_3'),
            'service_url_4' => __('attribute.service_url_4'),
            'service_image_1' => __('attribute.service_image_1'),
            'service_image_2' => __('attribute.service_image_2'),
            'service_image_3' => __('attribute.service_image_3'),
            'service_image_4' => __('attribute.service_image_4'),
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),

            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 1000]),

            'info_text.string' => __('rules.string'),
            'info_text.max' => __('rules.max', ['max' => 255]),

            'service_title_1.string' => __('rules.string'),
            'service_title_1.max' => __('rules.max', ['max' => 255]),

            'service_title_2.string' => __('rules.string'),
            'service_title_2.max' => __('rules.max', ['max' => 255]),

            'service_title_3.string' => __('rules.string'),
            'service_title_3.max' => __('rules.max', ['max' => 255]),

            'service_title_4.string' => __('rules.string'),
            'service_title_4.max' => __('rules.max', ['max' => 255]),

            'service_url_1.string' => __('rules.string'),
            'service_url_1.max' => __('rules.max', ['max' => 255]),

            'service_url_2.string' => __('rules.string'),
            'service_url_2.max' => __('rules.max', ['max' => 255]),

            'service_url_3.string' => __('rules.string'),
            'service_url_3.max' => __('rules.max', ['max' => 255]),

            'service_url_4.string' => __('rules.string'),
            'service_url_4.max' => __('rules.max', ['max' => 255]),

            'service_image_1.image' => __('rules.image'),
            'service_image_1.mimes' => __('rules.mimes', ['values' => 'jpeg,png,jpg']),
            'service_image_1.max' => __('rules.file_max', ['max' => 2048]),

            'service_image_2.image' => __('rules.image'),
            'service_image_2.mimes' => __('rules.mimes', ['values' => 'jpeg,png,jpg']),
            'service_image_2.max' => __('rules.file_max', ['max' => 2048]),

            'service_image_3.image' => __('rules.image'),
            'service_image_3.mimes' => __('rules.mimes', ['values' => 'jpeg,png,jpg']),
            'service_image_3.max' => __('rules.file_max', ['max' => 2048]),

            'service_image_4.image' => __('rules.image'),
            'service_image_4.mimes' => __('rules.mimes', ['values' => 'jpeg,png,jpg']),
            'service_image_4.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }
}
