<?php

namespace Modules\Frontend\Http\Requests\Pages\Services;

use Illuminate\Foundation\Http\FormRequest;

class ServicesPricingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'bg_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
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
            'bg_image.max' => __('rules.max_size', ['max' => 2048]),
            'subtitle.required' => __('rules.required'),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
        ];
    }

    public function attributes(): array
    {
        return [
            'bg_image' => __('attribute.bg_image'),
            'subtitle' => __('attribute.subtitle'),
            'title' => __('attribute.title'),
        ];
    }
}
