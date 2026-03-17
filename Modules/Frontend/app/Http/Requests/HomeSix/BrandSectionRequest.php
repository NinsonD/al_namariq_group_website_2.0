<?php

namespace Modules\Frontend\Http\Requests\HomeSix;

use Illuminate\Foundation\Http\FormRequest;

class BrandSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'brands_top' => 'nullable|array',
            'brands_top.*' => 'nullable|exists:brands,id',
            'brands_bottom' => 'nullable|array',
            'brands_bottom.*' => 'nullable|exists:brands,id',
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
            'brands_top' => __('attribute.brands_top'),
            'brands_top.*' => __('attribute.brands_top'),
            'brands_bottom' => __('attribute.brands_bottom'),
            'brands_bottom.*' => __('attribute.brands_bottom'),
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'brands_top.array' => __('rules.array'),
            'brands_top.*.exists' => __('rules.exists', ['attribute' => __('attribute.brands_top')]),
            'brands_bottom.array' => __('rules.array'),
            'brands_bottom.*.exists' => __('rules.exists', ['attribute' => __('attribute.brands_bottom')]),
        ];
    }
}
