<?php

namespace Modules\Frontend\Http\Requests\Pages\About;

use Illuminate\Foundation\Http\FormRequest;

class AboutStepRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'step_title_1' => 'nullable|string|max:255',
            'step_description_1' => 'nullable|string|max:1000',
            'step_title_2' => 'nullable|string|max:255',
            'step_description_2' => 'nullable|string|max:1000',
            'step_subtitle_3' => 'nullable|string|max:255',
            'step_description_3' => 'nullable|string|max:1000',
            'step_subtitle_4' => 'nullable|string|max:255',
            'step_description_4' => 'nullable|string|max:1000',
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
            'subtitle.required' => __('rules.required'),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'step_title_1.string' => __('rules.string'),
            'step_title_1.max' => __('rules.max', ['max' => 255]),
            'step_description_1.string' => __('rules.string'),
            'step_description_1.max' => __('rules.max', ['max' => 1000]),
            'step_title_2.string' => __('rules.string'),
            'step_title_2.max' => __('rules.max', ['max' => 255]),
            'step_description_2.string' => __('rules.string'),
            'step_description_2.max' => __('rules.max', ['max' => 1000]),
            'step_subtitle_3.string' => __('rules.string'),
            'step_subtitle_3.max' => __('rules.max', ['max' => 255]),
            'step_description_3.string' => __('rules.string'),
            'step_description_3.max' => __('rules.max', ['max' => 1000]),
            'step_subtitle_4.string' => __('rules.string'),
            'step_subtitle_4.max' => __('rules.max', ['max' => 255]),
            'step_description_4.string' => __('rules.string'),
            'step_description_4.max' => __('rules.max', ['max' => 1000]),
        ];
    }

    public function attributes(): array
    {
        return [
            'subtitle' => __('attribute.subtitle'),
            'title' => __('attribute.title'),
            'step_title_1' => __('attribute.step_title_1'),
            'step_description_1' => __('attribute.step_description_1'),
            'step_title_2' => __('attribute.step_title_2'),
            'step_description_2' => __('attribute.step_description_2'),
            'step_subtitle_3' => __('attribute.step_subtitle_3'),
            'step_description_3' => __('attribute.step_description_3'),
            'step_subtitle_4' => __('attribute.step_subtitle_4'),
            'step_description_4' => __('attribute.step_description_4'),
        ];
    }
}
