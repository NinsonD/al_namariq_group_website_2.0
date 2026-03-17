<?php

namespace Modules\Frontend\Http\Requests\HomeThree;

use Illuminate\Foundation\Http\FormRequest;

class PricingSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'bg_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
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
            'bg_image.image' => __('rules.image'),
            'bg_image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'bg_image.max' => __('rules.file_max', ['max' => 2048]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'subtitle.required' => __('rules.required'),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 500]),
        ];
    }

    /**
     * Get custom attribute names for validation messages.
     */
    public function attributes(): array
    {
        return [
            'bg_image' => __('attribute.bg_image'),
            'title' => __('attribute.title'),
            'subtitle' => __('attribute.subtitle'),
            'description' => __('attribute.description'),
        ];
    }
}
