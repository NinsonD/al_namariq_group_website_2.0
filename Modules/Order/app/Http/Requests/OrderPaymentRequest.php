<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderPaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'payment_status' => 'required|string|in:pending,success,rejected,refund'
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
            'payment_status.in' => __('rules.in', ['values' => 'pending, success, rejected, refund'])
        ];
    }

    public function attributes(): array
    {
        return [
            'payment_status' => __('attribute.payment_status'),
        ];
    }
}
