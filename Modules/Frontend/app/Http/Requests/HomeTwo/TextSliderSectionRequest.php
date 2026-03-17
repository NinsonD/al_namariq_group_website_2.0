<?php

namespace Modules\Frontend\Http\Requests\HomeTwo;

use Illuminate\Foundation\Http\FormRequest;

class TextSliderSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'slider_content_1' => 'required|string|max:255',
            'slider_content_2' => 'required|string|max:255',
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
            'slider_content_1.required' => __('rules.required'),
            'slider_content_1.string' => __('rules.string'),
            'slider_content_1.max' => __('rules.max', ['max' => 255]),
            'slider_content_2.required' => __('rules.required'),
            'slider_content_2.string' => __('rules.string'),
            'slider_content_2.max' => __('rules.max', ['max' => 255]),
        ];
    }

    public function attributes(): array
    {
        return [
            'slider_content_1' => __('attribute.slider_content_1'),
            'slider_content_2' => __('attribute.slider_content_2'),
        ];
    }
}
