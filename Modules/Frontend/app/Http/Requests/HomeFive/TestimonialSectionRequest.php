<?php

namespace Modules\Frontend\Http\Requests\HomeFive;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'bg_shape' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bg_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'review_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'nullable|string|max:255',
            'testimonials' => 'nullable|array',
            'testimonials.*' => 'nullable|exists:testimonials,id',
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
            'bg_shape' => __('attribute.bg_shape'),
            'bg_image' => __('attribute.bg_image'),
            'image_1' => __('attribute.image_1'),
            'image_2' => __('attribute.image_2'),
            'image_3' => __('attribute.image_3'),
            'review_image' => __('attribute.review_image'),
            'title' => __('attribute.title'),
            'testimonials' => __('attribute.testimonials'),
        ];
    }

    public function messages(): array
    {
        return [
            'bg_shape.image' => __('rules.image'),
            'bg_shape.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'bg_shape.max' => __('rules.file_max', ['max' => 2048]),

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

            'review_image.image' => __('rules.image'),
            'review_image.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'review_image.max' => __('rules.file_max', ['max' => 2048]),

            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),

            'testimonials.array' => __('rules.array'),
            'testimonials.*.exists' => __('rules.exists', ['attribute' => __('attribute.testimonial')]),
        ];
    }
}
