<?php

namespace Modules\Frontend\Http\Requests\HomeTwo;

use Illuminate\Foundation\Http\FormRequest;

class BenefitSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'icon_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'icon_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'icon_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'benefit_title_1' => 'nullable|string|max:255',
            'benefit_title_2' => 'nullable|string|max:255',
            'benefit_title_3' => 'nullable|string|max:255',
            'benefit_description_1' => 'nullable|string',
            'benefit_description_2' => 'nullable|string',
            'benefit_description_3' => 'nullable|string',
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
            'subtitle.required' => __('rules.required'),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'icon_1.image' => __('rules.image'),
            'icon_1.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'icon_1.max' => __('rules.file_max', ['max' => 2048]),
            'icon_2.image' => __('rules.image'),
            'icon_2.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'icon_2.max' => __('rules.file_max', ['max' => 2048]),
            'icon_3.image' => __('rules.image'),
            'icon_3.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'icon_3.max' => __('rules.file_max', ['max' => 2048]),
            'benefit_title_1.string' => __('rules.string'),
            'benefit_title_1.max' => __('rules.max', ['max' => 255]),
            'benefit_title_2.string' => __('rules.string'),
            'benefit_title_2.max' => __('rules.max', ['max' => 255]),
            'benefit_title_3.string' => __('rules.string'),
            'benefit_title_3.max' => __('rules.max', ['max' => 255]),
        ];
    }

    public function attributes(): array
    {
        return [
            'subtitle' => __('attribute.subtitle'),
            'title' => __('attribute.title'),
            'icon_1' => __('attribute.icon_1'),
            'icon_2' => __('attribute.icon_2'),
            'icon_3' => __('attribute.icon_3'),
            'benefit_title_1' => __('attribute.benefit_title_1'),
            'benefit_title_2' => __('attribute.benefit_title_2'),
            'benefit_title_3' => __('attribute.benefit_title_3'),
            'benefit_description_1' => __('attribute.benefit_description_1'),
            'benefit_description_2' => __('attribute.benefit_description_2'),
            'benefit_description_3' => __('attribute.benefit_description_3'),
        ];
    }
}
