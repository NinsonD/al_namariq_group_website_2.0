<?php

namespace Modules\Frontend\Http\Requests\HomeShop;

use Illuminate\Foundation\Http\FormRequest;

class CategorySectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'categories' => 'nullable|array',
            'categories.*' => 'nullable|exists:product_categories,id',
            'big_category' => 'nullable|exists:product_categories,id',
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
            'categories.array' => __('rules.array'),
            'categories.*.exists' => __('rules.exists'),
            'big_category.exists' => __('rules.exists'),
        ];
    }

    public function attributes(): array
    {
        return [
            'categories' => __('attribute.categories'),
            'big_category' => __('attribute.big_category'),
        ];
    }
}
