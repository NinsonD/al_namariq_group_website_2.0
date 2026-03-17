<?php

namespace Modules\Frontend\Http\Requests\HomeFive;

use Illuminate\Foundation\Http\FormRequest;

class GallerySectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'video_url' => 'nullable|string|max:255',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_4' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_5' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_6' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
            'video_url' => __('attribute.video_url'),
            'image_1' => __('attribute.image_1'),
            'image_2' => __('attribute.image_2'),
            'image_3' => __('attribute.image_3'),
            'image_4' => __('attribute.image_4'),
            'image_5' => __('attribute.image_5'),
            'image_6' => __('attribute.image_6'),
        ];
    }

    public function messages(): array
    {
        return [
            'video_url.string' => __('rules.string'),
            'video_url.max' => __('rules.max', ['max' => 255]),

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
        ];
    }
}
