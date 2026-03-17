<?php

namespace Modules\Appearance\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'site_primary_color' => ['required','string','max:100'],
            'site_secondary_color' => ['required','string','max:100'],
            'site_third_color' => ['required','string','max:100'],
            'shop_theme_color' => ['required','string','max:100'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array    {
        return [
            'site_primary_color.required' => __('rules.required'),
            'site_primary_color.string' => __('rules.string'),
            'site_primary_color.max' => __('rules.max', ['max' => 100]),
            'site_secondary_color.required' => __('rules.required'),
            'site_secondary_color.string' => __('rules.string'),
            'site_secondary_color.max' => __('rules.max', ['max'=> 100]),
            'site_third_color.required' => __('rules.required'),
            'site_third_color.string' => __('rules.string'),
            'site_third_color.max' => __('rules.max', ['max'=> 100]),
            'shop_theme_color.required' => __('rules.required'),
            'shop_theme_color.string' => __('rules.string'),
            'shop_theme_color.max' => __('rules.max', ['max'=> 100]),
        ];
    }

    public function attributes(): array
    {
        return [
            'site_primary_color' => __('attribute.primary_color'),
            'site_secondary_color' => __('attribute.secondary_color'),
            'site_third_color' => __('attribute.third_color'),
            'shop_theme_color' => __('attribute.shop_theme_color'),
        ];
    }
}
