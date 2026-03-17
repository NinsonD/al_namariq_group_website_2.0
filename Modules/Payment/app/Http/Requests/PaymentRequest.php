<?php

namespace Modules\Payment\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'key'    => ['required', 'string', 'in:stripe,paypal,cash_on_delivery,bank_transfer'],
            'gateway_charge' => ['nullable', 'numeric', 'min:0'],
            'image'  => ['nullable', 'image', 'mimes:png,jpg,jpeg', 'max:2048'],
            'status' => ['nullable'],
        ];

        switch ($this->key) {
            case 'stripe':
                $rules['stripe_client'] = ['required', 'string', 'max:255'];
                $rules['stripe_secret'] = ['required', 'string', 'max:255'];
                break;

            case 'paypal':
                $rules['paypal_client_id']   = ['required', 'string', 'max:255'];
                $rules['paypal_secret_key']  = ['required', 'string', 'max:255'];
                $rules['paypal_account_mode'] = ['required', 'in:sandbox,live'];
                break;

            case 'bank_transfer':
                $rules['bank_information'] = ['required', 'string'];
                break;
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'key.required' => __('rules.required'),
            'key.string'   => __('rules.string'),
            'key.in'       => __('rules.in'),

            'gateway_charge.numeric' => __('rules.numeric'),
            'gateway_charge.min'     => __('rules.min', ['min' => 0]),

            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes'),
            'image.max'   => __('rules.file_max', ['max' => 2048]),

            'stripe_client.required' => __('rules.required'),
            'stripe_client.string'   => __('rules.string'),
            'stripe_client.max'      => __('rules.max', ['max' => 255]),

            'stripe_secret.required' => __('rules.required'),
            'stripe_secret.string'   => __('rules.string'),
            'stripe_secret.max'      => __('rules.max', ['max' => 255]),

            'paypal_client_id.required'  => __('rules.required'),
            'paypal_client_id.string'    => __('rules.string'),
            'paypal_client_id.max'       => __('rules.max', ['max' => 255]),

            'paypal_secret_key.required' => __('rules.required'),
            'paypal_secret_key.string'   => __('rules.string'),
            'paypal_secret_key.max'      => __('rules.max', ['max' => 255]),

            'paypal_account_mode.required' => __('rules.required'),
            'paypal_account_mode.in'       => __('rules.in'),

            'bank_information.required' => __('rules.required'),
            'bank_information.string'   => __('rules.string'),
        ];
    }

    public function attributes(): array
    {
        return [
            'key'                  => __('attribute.payment_key'),
            'gateway_charge'       => __('attribute.gateway_charge'),
            'image'                => __('attribute.image'),
            'status'               => __('attribute.status'),

            'stripe_client'        => __('attribute.stripe_client'),
            'stripe_secret'        => __('attribute.stripe_secret'),

            'paypal_client_id'     => __('attribute.paypal_client_id'),
            'paypal_secret_key'    => __('attribute.paypal_secret_key'),
            'paypal_account_mode'  => __('attribute.paypal_account_mode'),

            'bank_information'     => __('attribute.bank_information'),
        ];
    }


}
