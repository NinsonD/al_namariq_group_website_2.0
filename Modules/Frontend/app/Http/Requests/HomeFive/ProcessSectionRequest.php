<?php

namespace Modules\Frontend\Http\Requests\HomeFive;

use Illuminate\Foundation\Http\FormRequest;

class ProcessSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'process_number_1' => 'nullable|string|max:255',
            'process_title_1' => 'nullable|string|max:255',
            'process_description_1' => 'nullable|string|max:255',
            'process_number_2' => 'nullable|string|max:255',
            'process_title_2' => 'nullable|string|max:255',
            'process_description_2' => 'nullable|string|max:255',
            'process_number_3' => 'nullable|string|max:255',
            'process_title_3' => 'nullable|string|max:255',
            'process_description_3' => 'nullable|string|max:255',
            'process_number_4' => 'nullable|string|max:255',
            'process_title_4' => 'nullable|string|max:255',
            'process_description_4' => 'nullable|string|max:255',
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
            'subtitle' => __('attribute.subtitle'),
            'process_number_1' => __('attribute.process_number_1'),
            'process_title_1' => __('attribute.process_title_1'),
            'process_description_1' => __('attribute.process_description_1'),
            'process_number_2' => __('attribute.process_number_2'),
            'process_title_2' => __('attribute.process_title_2'),
            'process_description_2' => __('attribute.process_description_2'),
            'process_number_3' => __('attribute.process_number_3'),
            'process_title_3' => __('attribute.process_title_3'),
            'process_description_3' => __('attribute.process_description_3'),
            'process_number_4' => __('attribute.process_number_4'),
            'process_title_4' => __('attribute.process_title_4'),
            'process_description_4' => __('attribute.process_description_4'),
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),

            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),

            'process_number_1.string' => __('rules.string'),
            'process_number_1.max' => __('rules.max', ['max' => 255]),

            'process_title_1.string' => __('rules.string'),
            'process_title_1.max' => __('rules.max', ['max' => 255]),

            'process_description_1.string' => __('rules.string'),
            'process_description_1.max' => __('rules.max', ['max' => 255]),

            'process_number_2.string' => __('rules.string'),
            'process_number_2.max' => __('rules.max', ['max' => 255]),

            'process_title_2.string' => __('rules.string'),
            'process_title_2.max' => __('rules.max', ['max' => 255]),

            'process_description_2.string' => __('rules.string'),
            'process_description_2.max' => __('rules.max', ['max' => 255]),

            'process_number_3.string' => __('rules.string'),
            'process_number_3.max' => __('rules.max', ['max' => 255]),

            'process_title_3.string' => __('rules.string'),
            'process_title_3.max' => __('rules.max', ['max' => 255]),

            'process_description_3.string' => __('rules.string'),
            'process_description_3.max' => __('rules.max', ['max' => 255]),

            'process_number_4.string' => __('rules.string'),
            'process_number_4.max' => __('rules.max', ['max' => 255]),

            'process_title_4.string' => __('rules.string'),
            'process_title_4.max' => __('rules.max', ['max' => 255]),

            'process_description_4.string' => __('rules.string'),
            'process_description_4.max' => __('rules.max', ['max' => 255]),
        ];
    }
}
