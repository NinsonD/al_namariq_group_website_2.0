<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'seo_title' => ['required', 'string', 'max:255'],
            'seo_description' => ['required', 'string'],
            'seo_keywords' => ['required', 'string'],
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
            'seo_title.required' => __('rules.required'),
            'seo_title.string' => __('rules.string'),
            'seo_title.max' => __('rules.max', ['max'=> 255]),
            'seo_description.required' => __('rules.required'),
            'seo_description.string' => __('rules.string'),
            'seo_keywords.required' => __('rules.required'),
            'seo_keywords.string' => __('rules.string'),
        ];
    }

    public function attributes(): array
    {
        return [
            'seo_title' => __('attribute.seo_title'),
            'seo_description' => __('attribute.seo_description'),
            'seo_keywords' => __('attribute.seo_keywords'),
        ];
    }
}
