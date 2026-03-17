<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopSettingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'tax'                  => ['required', 'integer', 'min:0'],
            'cart_empty_image'     => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'cartmini_empty_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'order_success_image'  => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'order_failed_image'   => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages():array
    {
        return [
            'tax.required' => __('rules.required'),
            'tax.integer' => __('rules.integer'),

            'cart_empty_image.image' => __('rules.image'),
            'cart_empty_image.mimes' => __('rules.mimes'),
            'cart_empty_image.max'   => __('rules.file_max'),

            'cartmini_empty_image.image' => __('rules.image'),
            'cartmini_empty_image.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'cartmini_empty_image.max'   => __('rules.file_max'),

            'order_success_image.image' => __('rules.image'),
            'order_success_image.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'order_success_image.max'   => __('rules.file_max'),

            'order_failed_image.image' => __('rules.image'),
            'order_failed_image.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'order_failed_image.max'   => __('rules.file_max'),
        ];
    }

    public function attributes():array
    {
        return [
            'tax' => __('attribute.tax'),
            'cart_empty_image' => __('attribute.cart_empty_image'),
            'cartmini_empty_image' => __('attribute.cartmini_empty_image'),
            'order_success_image' => __('attribute.order_success_image'),
            'order_failed_image' => __('attribute.order_failed_image'),
        ];
    }
}
