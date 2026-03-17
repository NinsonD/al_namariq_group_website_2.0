<?php

namespace Modules\Frontend\Http\Requests\HomeMain;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialSectionRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'code' => 'required|string|exists:languages,code',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'video_thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bg_shape' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'testimonials' => 'nullable|array',
            'testimonials.*' => 'nullable|exists:testimonials,id',
            'video_url' => 'nullable|string|max:255',
        ];
    }

    public function attributes(): array
    {
        return [
            'code' => __('attribute.language_code'),
            'title'=> __('attribute.title'),
            'subtitle' => __('attribute.subtitle'),
            'video_thumbnail' => __('attribute.video_thumbnail'),
            'testimonials' => __('attribute.testimonials'),
            'testimonials.*' => __('attribute.testimonials'),
            'video_url' => __('attribute.video_url'),
            'bg_shape' => __('attribute.bg_shape'),
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => __('rules.required'),
            'code.string' => __('rules.string'),
            'code.exists' => __('rules.exists', ['attribute' => __('attribute.language_code')]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'video_thumbnail.image' => __('rules.image'),
            'video_thumbnail.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'video_thumbnail.max' => __('rules.max_size', ['max' => 2048]),
            'bg_shape.image' => __('rules.image'),
            'bg_shape.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'bg_shape.max' => __('rules.max_size', ['max' => 2048]),
            'testimonials.array' => __('rules.array'),
            'testimonials.*.exists' => __('rules.exists', ['attribute' => __('attribute.testimonials')]),
            'video_url.string' => __('rules.string'),
            'video_url.max' => __('rules.max', ['max' => 255]),
        ];
    }
}
