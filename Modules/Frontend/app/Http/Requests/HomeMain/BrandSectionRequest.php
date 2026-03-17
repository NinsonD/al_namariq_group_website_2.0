<?php

namespace Modules\Frontend\Http\Requests\HomeMain;

use Illuminate\Foundation\Http\FormRequest;

class BrandSectionRequest extends FormRequest
{
     /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'code' => 'required|string|exists:languages,code',
            'brands' => 'nullable|array',
            'brands.*' => 'nullable|exists:brands,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'code' => __('attribute.language_code'),
            'brands' => __('attribute.brands'),
            'brands.*' => __('attribute.brands'),
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => __('rules.required'),
            'code.string' => __('rules.string'),
            'code.exists' => __('rules.exists', ['attribute' => __('attribute.language_code')]),
            'brands.array' => __('rules.array'),
            'brands.*.exists' => __('rules.exists', ['attribute' => __('attribute.brands')]),
        ];
    }
}
