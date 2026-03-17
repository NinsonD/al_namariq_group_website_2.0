<?php

namespace Modules\Frontend\Http\Requests\HomeTwo;

use Illuminate\Foundation\Http\FormRequest;

class FaqSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'faqs' => 'nullable|array',
            'faqs.*' => 'nullable|exists:faqs,id',
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
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
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image.max' => __('rules.file_max', ['max' => 2048]),
            'shape.image' => __('rules.image'),
            'shape.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape.max' => __('rules.file_max', ['max' => 2048]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'subtitle.required' => __('rules.required'),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
        ];
    }

    /**
     * Get custom attribute names for validation messages.
     */
    public function attributes(): array
    {
        return [
            'image' => __('attribute.image'),
            'shape' => __('attribute.shape'),
            'faqs' => __('attribute.faqs'),
            'title' => __('attribute.title'),
            'subtitle' => __('attribute.subtitle'),
        ];
    }
}
