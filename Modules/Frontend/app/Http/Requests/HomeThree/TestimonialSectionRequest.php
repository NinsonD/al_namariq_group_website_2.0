<?php

namespace Modules\Frontend\Http\Requests\HomeThree;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'bg_rating' => 'required|numeric|min:0|max:10',
            'rating_text' => 'required|string|max:255',
            'rating_description' => 'required|string|max:500',
            'bg_shape' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'brand_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
            'bg_rating.required' => __('rules.required'),
            'bg_rating.numeric' => __('rules.numeric'),
            'bg_rating.min' => __('rules.min', ['min' => 0]),
            'bg_rating.max' => __('rules.max', ['max' => 10]),
            'rating_text.required' => __('rules.required'),
            'rating_text.string' => __('rules.string'),
            'rating_text.max' => __('rules.max', ['max' => 255]),
            'rating_description.required' => __('rules.required'),
            'rating_description.string' => __('rules.string'),
            'rating_description.max' => __('rules.max', ['max' => 500]),
            'bg_shape.image' => __('rules.image'),
            'bg_shape.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'bg_shape.max' => __('rules.file_max', ['max' => 2048]),
            'shape_1.image' => __('rules.image'),
            'shape_1.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_1.max' => __('rules.file_max', ['max' => 2048]),
            'shape_2.image' => __('rules.image'),
            'shape_2.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_2.max' => __('rules.file_max', ['max' => 2048]),
            'brand_image.image' => __('rules.image'),
            'brand_image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'brand_image.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'subtitle' => __('attribute.subtitle'),
            'bg_rating' => __('attribute.bg_rating'),
            'rating_text' => __('attribute.rating_text'),
            'rating_description' => __('attribute.rating_description'),
            'bg_shape' => __('attribute.bg_shape'),
            'shape_1' => __('attribute.shape_1'),
            'shape_2' => __('attribute.shape_2'),
            'brand_image' => __('attribute.brand_image'),
        ];
    }
}
