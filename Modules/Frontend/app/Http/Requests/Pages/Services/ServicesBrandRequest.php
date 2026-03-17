<?php

namespace Modules\Frontend\Http\Requests\Pages\Services;

use Illuminate\Foundation\Http\FormRequest;

class ServicesBrandRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'brands' => 'required|array',
            'brands.*' => 'required|exists:brands,id',
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
            'brands.required' => __('rules.required'),
            'brands.array' => __('rules.array'),
            'brands.*.exists' => __('rules.exists', ['attribute' => __('attribute.brands')]),
        ];
    }

    public function attributes(): array
    {
        return [
            'brands' => __('attribute.brands'),
            'brands.*' => __('attribute.brands'),
        ];
    }
}
