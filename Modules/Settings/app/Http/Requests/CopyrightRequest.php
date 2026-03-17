<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CopyrightRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'copyright_text' => ['required', 'string'],
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
            'copyright_text.required' => __('rules.required'),
            'copyright_text.string' => __('rules.string'),
        ];
    }

    public function attributes(): array
    {
        return [
            'copyright_text' => __('attribute.copyright_text'),
        ];
    }
}
