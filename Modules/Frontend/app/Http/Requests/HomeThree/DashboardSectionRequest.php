<?php

namespace Modules\Frontend\Http\Requests\HomeThree;

use Illuminate\Foundation\Http\FormRequest;

class DashboardSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subtitle_1' => 'required|string|max:255',
            'subtitle_2' => 'required|string|max:255',
            'subtitle_3' => 'required|string|max:255',
            'title_1' => 'required|string|max:255',
            'title_2' => 'required|string|max:255',
            'title_3' => 'required|string|max:255',
            'description_1' => 'nullable|string|max:500',
            'description_2' => 'nullable|string|max:500',
            'description_3' => 'nullable|string|max:500',
            'btn_text_1' => 'required|string|max:255',
            'btn_text_2' => 'required|string|max:255',
            'btn_text_3' => 'required|string|max:255',
            'btn_url_1' => 'required|string|max:255',
            'btn_url_2' => 'required|string|max:255',
            'btn_url_3' => 'required|string|max:255',
            'image_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'image_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_3' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_4' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_5' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_6' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_7' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_8' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'shape_9' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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
            'subtitle_1.required' => __('rules.required'),
            'subtitle_1.string' => __('rules.string'),
            'subtitle_1.max' => __('rules.max', ['max' => 255]),
            'subtitle_2.required' => __('rules.required'),
            'subtitle_2.string' => __('rules.string'),
            'subtitle_2.max' => __('rules.max', ['max' => 255]),
            'subtitle_3.required' => __('rules.required'),
            'subtitle_3.string' => __('rules.string'),
            'subtitle_3.max' => __('rules.max', ['max' => 255]),
            'title_1.required' => __('rules.required'),
            'title_1.string' => __('rules.string'),
            'title_1.max' => __('rules.max', ['max' => 255]),
            'title_2.required' => __('rules.required'),
            'title_2.string' => __('rules.string'),
            'title_2.max' => __('rules.max', ['max' => 255]),
            'title_3.required' => __('rules.required'),
            'title_3.string' => __('rules.string'),
            'title_3.max' => __('rules.max', ['max' => 255]),
            'description_1.string' => __('rules.string'),
            'description_1.max' => __('rules.max', ['max' => 500]),
            'description_2.string' => __('rules.string'),
            'description_2.max' => __('rules.max', ['max' => 500]),
            'description_3.string' => __('rules.string'),
            'description_3.max' => __('rules.max', ['max' => 500]),
            'btn_text_1.required' => __('rules.required'),
            'btn_text_1.string' => __('rules.string'),
            'btn_text_1.max' => __('rules.max', ['max' => 255]),
            'btn_text_2.required' => __('rules.required'),
            'btn_text_2.string' => __('rules.string'),
            'btn_text_2.max' => __('rules.max', ['max' => 255]),
            'btn_text_3.required' => __('rules.required'),
            'btn_text_3.string' => __('rules.string'),
            'btn_text_3.max' => __('rules.max', ['max' => 255]),
            'btn_url_1.required' => __('rules.required'),
            'btn_url_1.string' => __('rules.string'),
            'btn_url_1.max' => __('rules.max', ['max' => 255]),
            'btn_url_2.required' => __('rules.required'),
            'btn_url_2.string' => __('rules.string'),
            'btn_url_2.max' => __('rules.max', ['max' => 255]),
            'btn_url_3.required' => __('rules.required'),
            'btn_url_3.string' => __('rules.string'),
            'btn_url_3.max' => __('rules.max', ['max' => 255]),
            'image_1.image' => __('rules.image'),
            'image_1.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image_1.max' => __('rules.file_max', ['max' => 2048]),
            'image_2.image' => __('rules.image'),
            'image_2.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image_2.max' => __('rules.file_max', ['max' => 2048]),
            'image_3.image' => __('rules.image'),
            'image_3.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image_3.max' => __('rules.file_max', ['max' => 2048]),
            'shape_1.image' => __('rules.image'),
            'shape_1.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_1.max' => __('rules.file_max', ['max' => 2048]),
            'shape_2.image' => __('rules.image'),
            'shape_2.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_2.max' => __('rules.file_max', ['max' => 2048]),
            'shape_3.image' => __('rules.image'),
            'shape_3.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_3.max' => __('rules.file_max', ['max' => 2048]),
            'shape_4.image' => __('rules.image'),
            'shape_4.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_4.max' => __('rules.file_max', ['max' => 2048]),
            'shape_5.image' => __('rules.image'),
            'shape_5.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_5.max' => __('rules.file_max', ['max' => 2048]),
            'shape_6.image' => __('rules.image'),
            'shape_6.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_6.max' => __('rules.file_max', ['max'=> 2048]),
            'shape_7.image' => __('rules.image'),
            'shape_7.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_7.max' => __('rules.file_max', ['max' => 2048]),
            'shape_8.image' => __('rules.image'),
            'shape_8.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_8.max' => __('rules.file_max', ['max' => 2048]),
            'shape_9.image' => __('rules.image'),
            'shape_9.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'shape_9.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        return [
            'subtitle_1' => __('attribute.subtitle_1'),
            'subtitle_2' => __('attribute.subtitle_2'),
            'subtitle_3' => __('attribute.subtitle_3'),
            'title_1' => __('attribute.title_1'),
            'title_2' => __('attribute.title_2'),
            'title_3' => __('attribute.title_3'),
            'description_1' => __('attribute.description_1'),
            'description_2' => __('attribute.description_2'),
            'description_3' => __('attribute.description_3'),
            'btn_text_1' => __('attribute.btn_text_1'),
            'btn_text_2' => __('attribute.btn_text_2'),
            'btn_text_3' => __('attribute.btn_text_3'),
            'btn_url_1' => __('attribute.btn_url_1'),
            'btn_url_2' => __('attribute.btn_url_2'),
            'btn_url_3' => __('attribute.btn_url_3'),
            'image_1' => __('attribute.image_1'),
            'image_2' => __('attribute.image_2'),
            'image_3' => __('attribute.image_3'),
            'shape_1' => __('attribute.shape_1'),
            'shape_2' => __('attribute.shape_2'),
            'shape_3' => __('attribute.shape_3'),
            'shape_4' => __('attribute.shape_4'),
            'shape_5' => __('attribute.shape_5'),
            'shape_6' => __('attribute.shape_6'),
            'shape_7' => __('attribute.shape_7'),
            'shape_8' => __('attribute.shape_8'),
            'shape_9' => __('attribute.shape_9'),
        ];
    }
}
