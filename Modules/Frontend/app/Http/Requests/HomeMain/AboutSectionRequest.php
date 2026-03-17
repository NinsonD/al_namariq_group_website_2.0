<?php

namespace Modules\Frontend\Http\Requests\HomeMain;

use Illuminate\Foundation\Http\FormRequest;

class AboutSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'description' => 'required|string',
            'btn_text' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
            'subtitle' => __('attribute.subtitle'),
            'description' => __('attribute.description'),
            'btn_text' => __('attribute.btn_text'),
            'image' => __('attribute.image'),
            'image_2' => __('attribute.image_2'),
            'btn_url' => __('attribute.btn_url'),
            'code'=> __('attribute.language_code'),
        ];
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
            'description.required' => __('rules.required'),
            'description.string' => __('rules.string'),
            'btn_text.required' => __('rules.required'),
            'btn_text.string' => __('rules.string'),
            'btn_text.max' => __('rules.max', ['max' => 100]),
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'image.max' => __('rules.max_size', ['max' => 2048]),
            'image_2.image' => __('rules.image'),
            'image_2.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'image_2.max' => __('rules.max_size', ['max' => 2048]),
            'btn_url.string' => __('rules.string'),
            'btn_url.max' => __('rules.max', ['max' => 255]),
            'code.required' => __('rules.required'),
            'code.string' => __('rules.string'),
            'code.exists' => __('rules.exists', ['attribute' => __('attribute.language_code')]),
        ];
    }
}
