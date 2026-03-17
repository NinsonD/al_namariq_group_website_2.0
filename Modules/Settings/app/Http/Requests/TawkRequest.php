<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TawkRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'tawk_property_id' => ['required', 'string', 'max:255'],
            'tawk_widget_id' => ['required', 'string', 'max:255'],
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
            'tawk_property_id.required' => __('rules.required'),
            'tawk_property_id.string' => __('rules.string'),
            'tawk_property_id.max' => __('rules.max', ['max'=> 255]),
            'tawk_widget_id.required' => __('rules.required'),
            'tawk_widget_id.string' => __('rules.string'),
            'tawk_widget_id.max' => __('rules.max', ['max'=> 255]),
        ];
    }

    public function attributes(): array
    {
        return [
            'tawk_property_id' => __('attribute.tawk_property_id'),
            'tawk_widget_id' => __('attribute.tawk_widget_id'),
        ];
    }
}
