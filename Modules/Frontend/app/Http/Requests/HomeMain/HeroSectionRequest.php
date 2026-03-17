<?php

namespace Modules\Frontend\Http\Requests\HomeMain;

use Illuminate\Foundation\Http\FormRequest;

class HeroSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'btn_text' => 'nullable|string|max:100',
            'btn_url' => 'nullable|string|max:255',
            'counter_title_1' => 'nullable|string|max:255',
            'counter_number_1' => 'nullable|numeric',
            'counter_unit_1' => 'nullable|string|max:50',
            'counter_title_2' => 'nullable|string|max:255',
            'counter_number_2' => 'nullable|numeric',
            'counter_unit_2' => 'nullable|string|max:50',
            'say_hi_title' => 'nullable|string|max:255',
            'say_hi_url' => 'nullable|string|max:255',
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bg_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'say_hi_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'code' => 'required|string|exists:languages,code',
        ];

        return $rules;
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
            'subtitle' => __('attribute.subtitle'),
            'btn_text' => __('attribute.btn_text'),
            'btn_url' => __('attribute.btn_url'),
            'counter_title_1' => __('attribute.counter_title_1'),
            'counter_number_1' => __('attribute.counter_number_1'),
            'counter_unit_1' => __('attribute.counter_unit_1'),
            'counter_title_2' => __('attribute.counter_title_2'),
            'counter_number_2' => __('attribute.counter_number_2'),
            'counter_unit_2' => __('attribute.counter_unit_2'),
            'say_hi_title' => __('attribute.say_hi_title'),
            'say_hi_url' => __('attribute.say_hi_url'),
            'main_image' => __('attribute.main_image'),
            'bg_image' => __('attribute.bg_image'),
            'say_hi_image' => __('attribute.say_hi_image'),
            'code'=> __('attribute.language_code'),
        ];
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

            'btn_text.string' => __('rules.string'),
            'btn_text.max' => __('rules.max', ['max' => 100]),

            'btn_url.string' => __('rules.string'),
            'btn_url.max' => __('rules.max', ['max' => 255]),

            'counter_title_1.string' => __('rules.string'),
            'counter_title_1.max' => __('rules.max', ['max' => 255]),

            'counter_number_1.numeric' => __('rules.numeric'),

            'counter_unit_1.string' => __('rules.string'),
            'counter_unit_1.max' => __('rules.max', ['max' => 50]),

            'counter_title_2.string' => __('rules.string'),
            'counter_title_2.max' => __('rules.max', ['max' => 255]),

            'counter_number_2.numeric' => __('rules.numeric'),

            'counter_unit_2.string' => __('rules.string'),
            'counter_unit_2.max' => __('rules.max', ['max' => 50]),

            'say_hi_title.string' => __('rules.string'),
            'say_hi_title.max' => __('rules.max', ['max' => 255]),

            'say_hi_url.string' => __('rules.string'),
            'say_hi_url.max' => __('rules.max', ['max' => 255]),

            'main_image.image' => __('rules.image'),
            'main_image.mimes' => __('rules.mimes', ['values' => 'jpg, jpeg, png']),
            'main_image.max' => __('rules.max_size', ['max' => 2048]),

            'bg_image.image' => __('rules.image'),
            'bg_image.mimes' => __('rules.mimes', ['values' => 'jpg, jpeg, png']),
            'bg_image.max' => __('rules.max_size', ['max' => 2048]),

            'say_hi_image.image' => __('rules.image'),
            'say_hi_image.mimes' => __('rules.mimes', ['values' => 'jpg, jpeg, png']),
            'say_hi_image.max' => __('rules.max_size', ['max' => 2048]),

            'code.required' => __('rules.required'),
            'code.string' => __('rules.string'),
            'code.exists' => __('rules.exists', ['attribute' => __('attribute.language_code')]),
        ];
    }
}
