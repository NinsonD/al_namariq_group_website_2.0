<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RefundRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'order_id' => 'required|integer|exists:orders,id',
            'reason' => 'required|string|max:1000',
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
            'order_id.required' => __('rules.required'),
            'order_id.integer' => __('rules.integer'),
            'order_id.exists' => __('rules.exists'),
            'reason.required' => __('rules.required'),
            'reason.string' => __('rules.string'),
            'reason.max' => __('rules.max'),
        ];
    }

    public function attributes(): array
    {
        return [
            'order_id' => __('attribute.order_id'),
            'reason' => __('attribute.reason'),
        ];
    }
}
