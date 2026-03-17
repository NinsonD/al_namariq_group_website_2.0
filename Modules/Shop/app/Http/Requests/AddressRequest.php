<?php

namespace Modules\Shop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'province' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
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
            'first_name.required' => __('rules.required'),
            'first_name.string' => __('rules.string'),
            'first_name.max' => __('rules.max', ['max' => 255]),
            'last_name.required' => __('rules.required'),
            'last_name.string' => __('rules.string'),
            'last_name.max' => __('rules.max', ['max' => 255]),
            'email.required' => __('rules.required'),
            'email.email' => __('rules.email'),
            'email.max' => __('rules.max', ['max' => 255]),
            'phone.required' => __('rules.required'),
            'phone.string' => __('rules.string'),
            'phone.max' => __('rules.max', ['max' => 255]),
            'address.required' => __('rules.required'),
            'address.string' => __('rules.string'),
            'address.max' => __('rules.max', ['max' => 255]),
            'province.string' => __('rules.string'),
            'province.max' => __('rules.max', ['max' => 255]),
            'city.string' => __('rules.string'),
            'city.max' => __('rules.max', ['max' => 255]),
            'zip_code.string' => __('rules.string'),
            'zip_code.max' => __('rules.max', ['max' => 255]),
            'country.string' => __('rules.string'),
            'country.max' => __('rules.max', ['max' => 255]),
        ];
    }

    public function attributes(): array
    {
        return [
            'first_name' => __('attribute.first_name'),
            'last_name' => __('attribute.last_name'),
            'email' => __('attribute.email'),
            'phone' => __('attribute.phone'),
            'address' => __('attribute.address'),
            'province' => __('attribute.province'),
            'city' => __('attribute.city'),
            'zip_code' => __('attribute.zip_code'),
            'country' => __('attribute.country'),
        ];
    }
}
