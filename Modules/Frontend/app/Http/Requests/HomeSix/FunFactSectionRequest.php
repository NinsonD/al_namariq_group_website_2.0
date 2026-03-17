<?php

namespace Modules\Frontend\Http\Requests\HomeSix;

use Illuminate\Foundation\Http\FormRequest;

class FunFactSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subtitle' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'fact_subtitle_1' => 'nullable|string|max:255',
            'fact_title_1' => 'nullable|string|max:255',
            'fact_number_1' => 'nullable|numeric',
            'fact_unit_1' => 'nullable|string|max:255',
            'fact_subtitle_2' => 'nullable|string|max:255',
            'fact_title_2' => 'nullable|string|max:255',
            'fact_number_2' => 'nullable|numeric',
            'fact_unit_2' => 'nullable|string|max:255',
            'fact_subtitle_3' => 'nullable|string|max:255',
            'fact_title_3' => 'nullable|string|max:255',
            'fact_number_3' => 'nullable|numeric',
            'fact_unit_3' => 'nullable|string|max:255',
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
            'fact_subtitle_1' => __('attribute.fact_subtitle_1'),
            'fact_title_1' => __('attribute.fact_title_1'),
            'fact_number_1' => __('attribute.fact_number_1'),
            'fact_unit_1' => __('attribute.fact_unit_1'),
            'fact_subtitle_2' => __('attribute.fact_subtitle_2'),
            'fact_title_2' => __('attribute.fact_title_2'),
            'fact_number_2' => __('attribute.fact_number_2'),
            'fact_unit_2' => __('attribute.fact_unit_2'),
            'fact_subtitle_3' => __('attribute.fact_subtitle_3'),
            'fact_title_3' => __('attribute.fact_title_3'),
            'fact_number_3' => __('attribute.fact_number_3'),
            'fact_unit_3' => __('attribute.fact_unit_3'),
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
            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 1000]),
            'fact_subtitle_1.string' => __('rules.string'),
            'fact_subtitle_1.max' => __('rules.max', ['max' => 255]),
            'fact_title_1.string' => __('rules.string'),
            'fact_title_1.max' => __('rules.max', ['max' => 255]),
            'fact_number_1.numeric' => __('rules.numeric'),
            'fact_unit_1.string' => __('rules.string'),
            'fact_unit_1.max' => __('rules.max', ['max' => 255]),
            'fact_subtitle_2.string' => __('rules.string'),
            'fact_subtitle_2.max' => __('rules.max', ['max' => 255]),
            'fact_title_2.string' => __('rules.string'),
            'fact_title_2.max' => __('rules.max', ['max' => 255]),
            'fact_number_2.numeric' => __('rules.numeric'),
            'fact_unit_2.string' => __('rules.string'),
            'fact_unit_2.max' => __('rules.max', ['max' => 255]),
            'fact_subtitle_3.string' => __('rules.string'),
            'fact_subtitle_3.max' => __('rules.max', ['max' => 255]),
            'fact_title_3.string' => __('rules.string'),
            'fact_title_3.max' => __('rules.max', ['max' => 255]),
            'fact_number_3.numeric' => __('rules.numeric'),
            'fact_unit_3.string' => __('rules.string'),
            'fact_unit_3.max' => __('rules.max', ['max' => 255]),
        ];
    }
}
