<?php

namespace Modules\Frontend\Http\Requests\HomeTwo;

use Illuminate\Foundation\Http\FormRequest;

class BrandSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'brands' => 'nullable|array',
            'brands.*' => 'nullable|exists:brands,id',
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
            'brands.array' => __('rules.array'),
            'brands.*.exists' => __('rules.exists'),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'brands' => __('attribute.brands'),
        ];
    }
}
