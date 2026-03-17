<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'app_name' => ['required', 'string', 'max:255'],
            'site_address' => ['required', 'string', 'max:255'],
            'site_address_link' => ['required', 'string', 'max:255'],
            'site_email' => ['required', 'string', 'email', 'max:255'],
            'site_phone' => ['required', 'string', 'max:255'],
            'timezone' => ['required', 'string', 'max:255'],
            'date_format' => ['required', 'string', 'max:255'],
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
            'app_name.required' => __('rules.required'),
            'app_name.string' => __('rules.string'),
            'app_name.max' => __('rules.max', ['max'=> 255]),
            'site_address.required' => __('rules.required'),
            'site_address.string' => __('rules.string'),
            'site_address.max' => __('rules.max', ['max'=> 255]),
            'site_address_link.required' => __('rules.required'),
            'site_address_link.string' => __('rules.string'),
            'site_address_link.max' => __('rules.max', ['max'=> 255]),
            'site_email.required' => __('rules.required'),
            'site_email.string' => __('rules.string'),
            'site_email.email' => __('rules.email'),
            'site_email.max' => __('rules.max', ['max'=> 255]),
            'site_phone.required' => __('rules.required'),
            'site_phone.string' => __('rules.string'),
            'site_phone.max' => __('rules.max', ['max'=> 255]),
            'timezone.required' => __('rules.required'),
            'timezone.string' => __('rules.string'),
            'timezone.max' => __('rules.max', ['max'=> 255]),
            'date_format.required' => __('rules.required'),
            'date_format.string' => __('rules.string'),
            'date_format.max' => __('rules.max', ['max'=> 255]),
        ];
    }

    public function attributes(): array
    {
        return [
            'app_name' => __('attribute.app_name'),
            'site_address' => __('attribute.site_address'),
            'site_address_link' => __('attribute.site_address_link'),
            'site_email' => __('attribute.site_email'),
            'timezone' => __('attribute.timezone'),
            'site_phone' => __('attribute.site_phone'),
            'date_format' => __('attribute.date_format'),
        ];
    }
}
