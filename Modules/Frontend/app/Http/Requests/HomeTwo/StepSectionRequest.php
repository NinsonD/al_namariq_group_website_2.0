<?php

namespace Modules\Frontend\Http\Requests\HomeTwo;

use Illuminate\Foundation\Http\FormRequest;

class StepSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'main_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'thumb_shape_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'thumb_shape_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bg_shape_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'bg_shape_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'step_subtitle_1' => 'nullable|string|max:255',
            'step_title_1' => 'nullable|string|max:255',
            'step_description_1' => 'nullable|string|max:1000',
            'step_subtitle_2' => 'nullable|string|max:255',
            'step_title_2' => 'nullable|string|max:255',
            'step_description_2' => 'nullable|string|max:1000',
            'step_subtitle_3' => 'nullable|string|max:255',
            'step_title_3' => 'nullable|string|max:255',
            'step_description_3' => 'nullable|string|max:1000',
            'step_subtitle_4' => 'nullable|string|max:255',
            'step_title_4' => 'nullable|string|max:255',
            'step_description_4' => 'nullable|string|max:1000',
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
            'main_image.image' => __('rules.image'),
            'main_image.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'main_image.max' => __('rules.file_max', ['max' => 2048]),
            'thumb_shape_1.image' => __('rules.image'),
            'thumb_shape_1.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'thumb_shape_1.max' => __('rules.file_max', ['max' => 2048]),
            'thumb_shape_2.image' => __('rules.image'),
            'thumb_shape_2.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'thumb_shape_2.max' => __('rules.file_max', ['max' => 2048]),
            'bg_shape_1.image' => __('rules.image'),
            'bg_shape_1.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'bg_shape_1.max' => __('rules.file_max', ['max' => 2048]),
            'bg_shape_2.image' => __('rules.image'),
            'bg_shape_2.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'bg_shape_2.max' => __('rules.file_max', ['max' => 2048]),
            'subtitle.required' => __('rules.required'),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 1000]),
            'step_subtitle_1.string' => __('rules.string'),
            'step_subtitle_1.max' => __('rules.max', ['max' => 255]),
            'step_title_1.string' => __('rules.string'),
            'step_title_1.max' => __('rules.max', ['max' => 255]),
            'step_description_1.string' => __('rules.string'),
            'step_description_1.max' => __('rules.max', ['max' => 1000]),
            'step_subtitle_2.string' => __('rules.string'),
            'step_subtitle_2.max' => __('rules.max', ['max' => 255]),
            'step_title_2.string' => __('rules.string'),
            'step_title_2.max' => __('rules.max', ['max' => 255]),
            'step_description_2.string' => __('rules.string'),
            'step_description_2.max' => __('rules.max', ['max' => 1000]),
            'step_subtitle_3.string' => __('rules.string'),
            'step_subtitle_3.max' => __('rules.max', ['max' => 255]),
            'step_title_3.string' => __('rules.string'),
            'step_title_3.max' => __('rules.max', ['max' => 255]),
            'step_description_3.string' => __('rules.string'),
            'step_description_3.max' => __('rules.max', ['max' => 1000]),
            'step_subtitle_4.string' => __('rules.string'),
            'step_subtitle_4.max' => __('rules.max', ['max' => 255]),
            'step_title_4.string' => __('rules.string'),
            'step_title_4.max' => __('rules.max', ['max' => 255]),
            'step_description_4.string' => __('rules.string'),
            'step_description_4.max' => __('rules.max', ['max' => 1000]),
        ];
    }
}
