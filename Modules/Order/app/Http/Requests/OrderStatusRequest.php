<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStatusRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'order_status' => 'required|string|in:draft,pending,processing,success,refund,rejected',
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
            'order_status.in' => __('rules.in', ['values' => 'draft, pending, processing, success, refund, rejected'])
        ];
    }

    public function attributes(): array
    {
        return [
            'order_status' => __('attribute.order_status'),
        ];
    }
}
