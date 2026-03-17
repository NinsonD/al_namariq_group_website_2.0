<?php

namespace Modules\Frontend\Http\Requests\Pages\Services;

use Illuminate\Foundation\Http\FormRequest;

class ServicesHeroRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bg_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
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
            'image' => __('attribute.image'),
            'bg_image' => __('attribute.bg_image'),
            'title' => __('attribute.title'),
            'description' => __('attribute.description'),
            'code' => __('attribute.language_code'),
        ];
    }

    public function messages(): array
    {
        return [
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image.max' => __('rules.max', ['max' => 2048]),
            'bg_image.image' => __('rules.image'),
            'bg_image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'bg_image.max' => __('rules.max', ['max' => 2048]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'description.string' => __('rules.string'),
            'code.required' => __('rules.required'),
            'code.string' => __('rules.string'),
            'code.exists' => __('rules.exists'),
        ];
    }
}
