<?php

namespace Modules\Frontend\Http\Requests\HomeMain;

use Illuminate\Foundation\Http\FormRequest;

class ProcessSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'btn_text' => 'required|string|max:255',
            'process_title_1' => 'required|string|max:255',
            'process_title_2' => 'required|string|max:255',
            'process_title_3' => 'required|string|max:255',
            'process_description_1' => 'required|string|max:500',
            'process_description_2' => 'required|string|max:500',
            'process_description_3' => 'required|string|max:500',
            'btn_url' => 'nullable|string|max:255',
            'code' => 'required|string|exists:languages,code',
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
            'btn_text' => __('attribute.btn_text'),
            'process_title_1' => __('attribute.process_title_1'),
            'process_title_2' => __('attribute.process_title_2'),
            'process_title_3' => __('attribute.process_title_3'),
            'process_description_1' => __('attribute.process_description_1'),
            'process_description_2' => __('attribute.process_description_2'),
            'process_description_3' => __('attribute.process_description_3'),
            'btn_url' => __('attribute.btn_url'),
            'code' => __('attribute.language_code'),
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'btn_text.required' => __('rules.required'),
            'btn_text.string' => __('rules.string'),
            'btn_text.max' => __('rules.max', ['max' => 255]),
            'process_title_1.required' => __('rules.required'),
            'process_title_1.string' => __('rules.string'),
            'process_title_1.max' => __('rules.max', ['max' => 255]),
            'process_title_2.required' => __('rules.required'),
            'process_title_2.string' => __('rules.string'),
            'process_title_2.max' => __('rules.max', ['max' => 255]),
            'process_title_3.required' => __('rules.required'),
            'process_title_3.string' => __('rules.string'),
            'process_title_3.max' => __('rules.max', ['max' => 255]),
            'process_description_1.required' => __('rules.required'),
            'process_description_1.string' => __('rules.string'),
            'process_description_1.max' => __('rules.max', ['max' => 500]),
            'process_description_2.required' => __('rules.required'),
            'process_description_2.string' => __('rules.string'),
            'process_description_2.max' => __('rules.max', ['max' => 500]),
            'process_description_3.required' => __('rules.required'),
            'process_description_3.string' => __('rules.string'),
            'process_description_3.max' => __('rules.max', ['max' => 500]),
            'btn_url.string' => __('rules.string'),
            'btn_url.max' => __('rules.max', ['max' => 255]),
            'code.required' => __('rules.required'),
            'code.string' => __('rules.string'),
            'code.exists' => __('rules.exists', ['attribute' => __('attribute.language_code')]),
        ];
    }
}
