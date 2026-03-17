<?php

namespace Modules\Installer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'app_name' => 'required|string|max:255',
            'timezone' => 'required|timezone',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'app_name.required' =>__('rules.required'),
            'app_name.string' => __('rules.string'),
            'app_name.max' => __('rules.max', ['max'=> 255]),
            'timezone.required' => __('rules.required'),
            'timezone.timezone' => __('rules.timezone'),
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'app_name' => __('attribute.app_name'),
            'timezone' => __('attribute.timezone'),
        ];
    }
}
