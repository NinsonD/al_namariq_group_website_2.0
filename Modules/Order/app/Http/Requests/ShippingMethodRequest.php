<?php

namespace Modules\Order\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShippingMethodRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'fee' => ['required', 'numeric', 'min:0'],
            'min_amount' => ['required', 'numeric', 'min:0'],
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
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'fee.required' => __('rules.required'),
            'fee.numeric' => __('rules.numeric'),
            'fee.min' => __('rules.min', ['min' => 0]),
            'min_amount.required' => __('rules.required'),
            'min_amount.numeric' => __('rules.numeric'),
            'min_amount.min' => __('rules.min', ['min' => 0]),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'fee' => __('attribute.fee'),
            'min_amount' => __('attribute.min_amount'),
        ];
    }

}
