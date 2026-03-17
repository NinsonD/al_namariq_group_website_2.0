<?php

namespace Modules\Frontend\Http\Requests\HomeFive;

use Illuminate\Foundation\Http\FormRequest;

class AboutSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'counter_title_1' => 'nullable|string|max:255',
            'counter_number_1' => 'nullable|numeric',
            'counter_unit_1' => 'nullable|string|max:255',
            'counter_title_2' => 'nullable|string|max:255',
            'counter_number_2' => 'nullable|numeric',
            'counter_unit_2' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'people_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'shape' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
            'description' => __('attribute.description'),
            'counter_title_1' => __('attribute.counter_title_1'),
            'counter_number_1' => __('attribute.counter_number_1'),
            'counter_unit_1' => __('attribute.counter_unit_1'),
            'counter_title_2' => __('attribute.counter_title_2'),
            'counter_number_2' => __('attribute.counter_number_2'),
            'counter_unit_2' => __('attribute.counter_unit_2'),
            'main_image' => __('attribute.main_image'),
            'people_image' => __('attribute.people_image'),
            'shape' => __('attribute.shape'),
        ];
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

            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 1000]),

            'counter_title_1.string' => __('rules.string'),
            'counter_title_1.max' => __('rules.max', ['max' => 255]),

            'counter_number_1.numeric' => __('rules.numeric'),

            'counter_unit_1.string' => __('rules.string'),
            'counter_unit_1.max' => __('rules.max', ['max' => 255]),

            'counter_title_2.string' => __('rules.string'),
            'counter_title_2.max' => __('rules.max', ['max' => 255]),

            'counter_number_2.numeric' => __('rules.numeric'),

            'counter_unit_2.string' => __('rules.string'),
            'counter_unit_2.max' => __('rules.max', ['max' => 255]),

            'main_image.image' => __('rules.image'),
            'main_image.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'main_image.max' => __('rules.file_max', ['max' => 2048]),

            'people_image.image' => __('rules.image'),
            'people_image.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'people_image.max' => __('rules.file_max', ['max' => 2048]),

            'shape.image' => __('rules.image'),
            'shape.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'shape.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }
}
