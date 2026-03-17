<?php

namespace Modules\Frontend\Http\Requests\HomeFive;

use Illuminate\Foundation\Http\FormRequest;

class TextSliderSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'slider_content' => 'nullable|string|max:1000',
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
            'slider_content' => __('attribute.slider_content'),
        ];
    }

    public function messages(): array
    {
        return [
            'slider_content.string' => __('rules.string'),
            'slider_content.max' => __('rules.max', ['max' => 1000]),
        ];
    }
}
