<?php

namespace Modules\Coupon\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
         return [
            'coupon_code' => [
                'required',
                'string',
                'max:255',
                Rule::unique('coupons', 'coupon_code')->ignore($this->route('coupon')),
            ],
            'min_price' => 'required|numeric|min:0',
            'discount' => [
                'required',
                'numeric',
                'min:0',
                Rule::when($this->input('discount_type') === 'percentage', ['max:100']),
            ],
            'discount_type' => 'required|in:percentage,amount',
            'free_shipping' => 'boolean',
            'per_user_limit' => 'required|integer|min:1',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'boolean',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
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
            'coupon_code.required' => __('rules.required'),
            'coupon_code.unique' => __('rules.unique'),
            'min_price.required' => __('rules.required'),
            'min_price.numeric' => __('rules.numeric'),
            'discount.required' => __('rules.required'),
            'discount.numeric' => __('rules.numeric'),
            'discount.max' => __('rules.num_max', ['max' => 100]),
            'discount_type.required' => __('rules.required'),
            'discount_type.in' => __('rules.in', ['values' => 'percentage,amount']),
            'free_shipping.boolean' => __('rules.boolean'),
            'per_user_limit.required' => __('rules.required'),
            'per_user_limit.integer' => __('rules.integer'),
            'per_user_limit.min' => __('rules.min', ['min' => 1]),
            'start_date.required' => __('rules.required'),
            'start_date.date' => __('rules.date'),
            'start_date.after_or_equal' => __('rules.after_or_equal', ['date' => 'today']),
            'end_date.required' => __('rules.required'),
            'end_date.date' => __('rules.date'),
            'end_date.after' => __('rules.after', ['date' => __('attribute.start_date')]),
            'status.boolean' => __('rules.boolean'),
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes', ['values' => 'png,jpg,jpeg']),
            'image.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        return [
            'coupon_code' => __('attribute.coupon_code'),
            'min_price' => __('attribute.min_price'),
            'discount' => __('attribute.discount'),
            'discount_type' => __('attribute.discount_type'),
            'free_shipping' => __('attribute.free_shipping'),
            'per_user_limit' => __('attribute.per_user_limit'),
            'start_date' => __('attribute.start_date'),
            'end_date' => __('attribute.end_date'),
            'image' => __('attribute.image'),
        ];
    }
}
