<?php

namespace Modules\Currency\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:currencies,code,' . $this->route('currency'),
            'symbol' => 'required|string|max:10',
            'exchange_rate' => 'required|numeric|min:0',
            'is_default' => 'sometimes|boolean',
            'status' => 'sometimes|boolean',
            'symbol_position' => 'required|in:before_price,after_price,before_price_space,after_price_space',
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
            'code.required' => __('rules.required'),
            'code.string' => __('rules.string'),
            'code.max' => __('rules.max', ['max' => 10]),
            'code.unique' => __('rules.unique'),
            'symbol.required' => __('rules.required'),
            'symbol.string' => __('rules.string'),
            'symbol.max' => __('rules.max', ['max' => 10]),
            'exchange_rate.required' => __('rules.required'),
            'exchange_rate.numeric' => __('rules.numeric'),
            'exchange_rate.min' => __('rules.min', ['min' => 0]),
            'is_default.boolean' => __('rules.boolean'),
            'status.boolean' => __('rules.boolean'),
            'symbol_position.required' => __('rules.required'),
            'symbol_position.in' => __('rules.in', ['values' => 'before_price, after_price, before_price_space, after_price_space']),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'code' => __('attribute.code'),
            'symbol' => __('attribute.symbol'),
            'exchange_rate' => __('attribute.exchange_rate'),
            'is_default' => __('attribute.default'),
            'status' => __('attribute.status'),
            'symbol_position' => __('attribute.symbol_position'),
        ];
    }
}
