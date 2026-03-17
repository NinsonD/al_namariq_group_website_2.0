<?php

namespace Modules\Pricing\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PricingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'currency' => ['required', 'string', 'max:10'],
            'expiration' => ['required', 'string', 'in:monthly,yearly'],
            'short_description' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'btn_text' => ['nullable', 'string', 'max:255'],
            'btn_url' => ['nullable', 'string', 'max:255'],
            'serial' => ['required', 'integer'],
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
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max'=> 255]),
            'price.required' => __('rules.required'),
            'price.numeric' => __('rules.numeric'),
            'expiration.required' => __('rules.required'),
            'expiration.in' => __('rules.exists'),
            'short_description.string' => __('rules.string'),
            'short_description.max' => __('rules.max', ['max'=> 255]),
            'description.string' => __('rules.string'),
            'btn_text.string' => __('rules.string'),
            'btn_text.max' => __('rules.max', ['max'=> 255]),
            'btn_url.string' => __('rules.string'),
            'btn_url.max' => __('rules.max', ['max'=> 255]),
            'serial.required' => __('rules.required'),
            'serial.integer' => __('rules.integer'),
            'currency.required' => __('rules.required'),
            'currency.string' => __('rules.string'),
            'currency.max' => __('rules.max', ['max'=> 255]),
        ];
    }
    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'price' => __('attribute.price'),
            'expiration' => __('attribute.expiration'),
            'image' => __('attribute.image'),
            'short_description' => __('attribute.short_description'),
            'description' => __('attribute.description'),
            'btn_text' => __('attribute.btn_text'),
            'btn_url' => __('attribute.btn_url'),
            'status' => __('attribute.status'),
            'show_on_home' => __('attribute.show_on_home'),
            'serial' => __('attribute.serial'),
            'currency' => __('attribute.currency'),
        ];
    }
}
