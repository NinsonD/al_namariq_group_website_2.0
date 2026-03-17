<?php

namespace Modules\Frontend\Http\Requests\Pages\About;

use Illuminate\Foundation\Http\FormRequest;

class AboutHeroRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'nullable|string',
            'slider_text' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'subtitle.required' => __('rules.required'),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'description.string' => __('rules.string'),
            'slider_text.string' => __('rules.string'),
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'subtitle' => __('attribute.subtitle'),
            'description' => __('attribute.description'),
            'slider_text' => __('attribute.slider_text'),
            'image' => __('attribute.image'),
        ];
    }
}
