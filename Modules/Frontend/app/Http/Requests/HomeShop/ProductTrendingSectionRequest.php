<?php

namespace Modules\Frontend\Http\Requests\HomeShop;

use Illuminate\Foundation\Http\FormRequest;

class ProductTrendingSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'products' => 'nullable|array',
            'products.*' => 'nullable|exists:products,id',
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
            'products.array' => __('rules.array'),
            'products.*.exists' => __('rules.exists'),
        ];
    }

    public function attributes(): array
    {
        return [
            'products' => __('attribute.products'),
        ];
    }
}
