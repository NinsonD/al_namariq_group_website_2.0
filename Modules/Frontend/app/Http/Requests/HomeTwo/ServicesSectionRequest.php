<?php

namespace Modules\Frontend\Http\Requests\HomeTwo;

use Illuminate\Foundation\Http\FormRequest;

class ServicesSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'box_title' => 'required|string|max:255',
            'btn_text' => 'required|string|max:255',
            'services' => 'nullable|array',
            'services.*' => 'nullable|exists:services,id',
            'bg_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
            'subtitle.required' => __('rules.required'),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'box_title.required' => __('rules.required'),
            'box_title.string' => __('rules.string'),
            'box_title.max' => __('rules.max', ['max' => 255]),
            'btn_text.required' => __('rules.required'),
            'btn_text.string' => __('rules.string'),
            'btn_text.max' => __('rules.max', ['max' => 255]),
            'services.array' => __('rules.array'),
            'services.*.exists' => __('rules.exists'),
            'bg_image.image' => __('rules.image'),
            'bg_image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'bg_image.max' => __('rules.file_max', ['max' => 2048]),
            'shape.image' => __('rules.image'),
            'shape.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        return [
            'subtitle' => __('attribute.subtitle'),
            'title' => __('attribute.title'),
            'box_title' => __('attribute.box_title'),
            'btn_text' => __('attribute.btn_text'),
            'services' => __('attribute.services'),
            'bg_image' => __('attribute.bg_image'),
            'shape' => __('attribute.shape'),
        ];
    }
}
