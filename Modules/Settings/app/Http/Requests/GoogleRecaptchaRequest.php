<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoogleRecaptchaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'recaptcha_site_key' => ['required', 'string', 'max:255'],
            'recaptcha_secret_key' => ['required', 'string', 'max:255'],
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
            'recaptcha_site_key.required' => __('rules.required'),
            'recaptcha_site_key.string' => __('rules.string'),
            'recaptcha_site_key.max' => __('rules.max', ['max'=> 255]),
            'recaptcha_secret_key.required' => __('rules.required'),
            'recaptcha_secret_key.string' => __('rules.string'),
            'recaptcha_secret_key.max' => __('rules.max', ['max'=> 255]),
        ];
    }
    public function attributes(): array
    {
        return [
            'recaptcha_site_key' => __('attribute.recaptcha_site_key'),
            'recaptcha_secret_key' => __('attribute.recaptcha_secret_key'),
        ];
    }
}
