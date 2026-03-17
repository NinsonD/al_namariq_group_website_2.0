<?php

namespace Modules\Frontend\Http\Requests\HomeSix;

use Illuminate\Foundation\Http\FormRequest;

class TextSliderSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'slider_content_1' => 'nullable|string|max:1000',
            'slider_content_2' => 'nullable|string|max:1000',
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
            'slider_content_1' => __('attribute.slider_content_1'),
            'slider_content_2' => __('attribute.slider_content_2'),
        ];
    }

    public function messages(): array
    {
        return [
            'slider_content_1.string' => __('rules.string'),
            'slider_content_1.max' => __('rules.max', ['max' => 1000]),
            'slider_content_2.string' => __('rules.string'),
            'slider_content_2.max' => __('rules.max', ['max' => 1000]),
        ];
    }
}
