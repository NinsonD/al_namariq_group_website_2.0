<?php

namespace Modules\Translation\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TranslationRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {

        return [
            "key" => ['required', 'string'],
            "value" => ['required', 'string'],
            "lang" => ['required', 'string'],
            "file" => ['required', 'string'],
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
            'key.required' => __('rules.required'),
            'key.string' => __('rules.string'),
            'value.required' => __('rules.required'),
            'value.string' => __('rules.string'),
            'lang.required' => __('rules.required'),
            'lang.string' => __('rules.string'),
            'file.required' => __('rules.required'),
            'file.string' => __('rules.string'),
        ];
    }

    public function attributes(): array
    {
        return [
            'key' => __('attribute.key'),
            'value' => __('attribute.value'),
            'lang' => __('attribute.lang'),
            'file' => __('attribute.file'),
        ];
    }
}
