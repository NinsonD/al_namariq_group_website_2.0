<?php

namespace Modules\Frontend\Http\Requests\HomeThree;

use Illuminate\Foundation\Http\FormRequest;

class FeaturesSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'feature_title_1' => 'required|string|max:255',
            'feature_title_2' => 'required|string|max:255',
            'feature_title_3' => 'required|string|max:255',
            'feature_description_1' => 'nullable|string|max:500',
            'feature_description_2' => 'nullable|string|max:500',
            'feature_description_3' => 'nullable|string|max:500',
            'icon_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'icon_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'icon_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 500]),
            'feature_title_1.required' => __('rules.required'),
            'feature_title_1.string' => __('rules.string'),
            'feature_title_1.max' => __('rules.max', ['max' => 255]),
            'feature_title_2.required' => __('rules.required'),
            'feature_title_2.string' => __('rules.string'),
            'feature_title_2.max' => __('rules.max', ['max' => 255]),
            'feature_title_3.required' => __('rules.required'),
            'feature_title_3.string' => __('rules.string'),
            'feature_title_3.max' => __('rules.max', ['max' => 255]),
            'feature_description_1.string' => __('rules.string'),
            'feature_description_1.max' => __('rules.max', ['max' => 500]),
            'feature_description_2.string' => __('rules.string'),
            'feature_description_2.max' => __('rules.max', ['max' => 500]),
            'feature_description_3.string' => __('rules.string'),
            'feature_description_3.max' => __('rules.max', ['max' => 500]),
            'icon_1.image' => __('rules.image'),
            'icon_1.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'icon_1.max' => __('rules.file_max', ['max' => 2048]),
            'icon_2.image' => __('rules.image'),
            'icon_2.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'icon_2.max' => __('rules.file_max', ['max' => 2048]),
            'icon_3.image' => __('rules.image'),
            'icon_3.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'icon_3.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        return [
            'subtitle' => __('attribute.subtitle_1'),
            'title' => __('attribute.title_1'),
            'description' => __('attribute.description_1'),
            'feature_title_1' => __('attribute.feature_title_1'),
            'feature_title_2' => __('attribute.feature_title_2'),
            'feature_title_3' => __('attribute.feature_title_3'),
            'feature_description_1' => __('attribute.feature_description_1'),
            'feature_description_2' => __('attribute.feature_description_2'),
            'feature_description_3' => __('attribute.feature_description_3'),
            'icon_1' => __('attribute.icon_1'),
            'icon_2' => __('attribute.icon_2'),
            'icon_3' => __('attribute.icon_3'),
        ];
    }
}
