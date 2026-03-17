<?php

namespace Modules\Frontend\Http\Requests\HomeShop;

use Illuminate\Foundation\Http\FormRequest;

class HeroSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'sliders' => 'nullable|array',
            'sliders.*' => 'nullable|exists:sliders,id',
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
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'sliders.array' => __('rules.array'),
            'sliders.*.exists' => __('rules.exists'),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'sliders' => __('attribute.sliders'),
        ];
    }
}
