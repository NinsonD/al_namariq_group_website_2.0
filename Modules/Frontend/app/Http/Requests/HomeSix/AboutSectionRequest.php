<?php

namespace Modules\Frontend\Http\Requests\HomeSix;

use Illuminate\Foundation\Http\FormRequest;

class AboutSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'description' => 'nullable|string|max:1000',
            'btn_text' => 'nullable|string|max:255',
            'btn_url' => 'nullable|string|max:255',
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
            'description' => __('attribute.description'),
            'btn_text' => __('attribute.btn_text'),
            'btn_url' => __('attribute.btn_url'),
        ];
    }

    public function messages(): array
    {
        return [
            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 1000]),
            'btn_text.string' => __('rules.string'),
            'btn_text.max' => __('rules.max', ['max' => 255]),
            'btn_url.string' => __('rules.string'),
            'btn_url.max' => __('rules.max', ['max' => 255]),
        ];
    }
}
