<?php

namespace Modules\Shop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserOrderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'billing_address' => 'required|exists:addresses,id',
            'ship_to_diff_address' => 'nullable|in:on,off',
            'shipping' => 'required|exists:shipping_methods,id',
            'payment_method' => 'required|exists:payments,id',
            'order_note' => 'nullable|string|max:1000'
        ];

        if($this->input('ship_to_diff_address') === 'on') {
            $rules = array_merge($rules, [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'province' => 'required|string|max:255',
                'address' => 'required|string|max:500',
                'city' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'zip_code' => 'nullable|string|max:20',
            ]);
        }

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
            'billing_address.required' => __('rules.required'),
            'billing_address.exists' => __('rules.exists'),
            'ship_to_diff_address.in' => __('rules.in'),
            'shipping.required' => __('rules.required'),
            'shipping.exists' => __('rules.exists'),
            'payment_method.required' => __('rules.required'),
            'payment_method.exists' => __('rules.exists'),
            'order_note.string' => __('rules.string'),
            'order_note.max' => __('rules.max'),

            'first_name.required' => __('rules.required'),
            'first_name.string' => __('rules.string'),
            'first_name.max' => __('rules.max'),

            'last_name.required' => __('rules.required'),
            'last_name.string' => __('rules.string'),
            'last_name.max' => __('rules.max'),

            'email.required' => __('rules.required'),
            'email.email' => __('rules.email'),
            'email.max' => __('rules.max'),

            'phone.required' => __('rules.required'),
            'phone.string' => __('rules.string'),
            'phone.max' => __('rules.max'),

            'province.required' => __('rules.required'),
            'province.string' => __('rules.string'),
            'province.max' => __('rules.max'),

            'address.required' => __('rules.required'),
            'address.string' => __('rules.string'),
            'address.max' => __('rules.max'),

            'city.required' => __('rules.required'),
            'city.string' => __('rules.string'),
            'city.max' => __('rules.max'),

            'country.required' => __('rules.required'),
            'country.string' => __('rules.string'),
            'country.max' => __('rules.max'),

            'zip_code.string' => __('rules.string'),
            'zip_code.max' => __('rules.max'),
        ];
    }

    public function attributes(): array
    {
        return [
            'billing_address' => __('attribute.billing_address'),
            'ship_to_diff_address' => __('attribute.ship_to_diff_address'),
            'shipping' => __('attribute.shipping'),
            'payment_method' => __('attribute.payment_method'),
            'order_note' => __('attribute.order_note'),

            'first_name' => __('attribute.first_name'),
            'last_name' => __('attribute.last_name'),
            'email' => __('attribute.email'),
            'phone' => __('attribute.phone'),
            'province' => __('attribute.province'),
            'address' => __('attribute.address'),
            'city' => __('attribute.city'),
            'country' => __('attribute.country'),
            'zip_code' => __('attribute.zip_code'),
        ];

    }
}
