<?php

namespace Modules\Shop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductReviewRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'product_id' => ['required', 'exists:products,id'],
            'comment' => ['required', 'string', 'max:1000'],
            'rating' => ['required', 'integer', 'between:1,5'],
        ];

        return $rules;
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
            'product_id.required' => __('rules.required'),
            'product_id.exists' => __('rules.exists'),
            'comment.required' => __('rules.required'),
            'comment.max' => __('rules.max', ['max' => 1000]),
            'rating.required' => __('rules.required'),
            'rating.integer' => __('rules.integer'),
            'rating.between' => __('rules.between', ['min' => 1, 'max' => 5]),
        ];
    }

    public function attributes(): array
    {
        return [
            'product_id' => __('attribute.product'),
            'comment' => __('attribute.comment'),
            'rating' => __('attribute.rating'),
        ];
    }
}
