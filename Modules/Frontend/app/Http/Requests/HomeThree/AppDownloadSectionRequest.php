<?php

namespace Modules\Frontend\Http\Requests\HomeThree;

use Illuminate\Foundation\Http\FormRequest;

class AppDownloadSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'btn_text_1' => 'required|string|max:255',
            'btn_text_2' => 'required|string|max:255',
            'btn_url_1' => 'required|string|max:255',
            'btn_url_2' => 'required|string|max:255',
            'btn_icon_1' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'btn_icon_2' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'image_1' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            'image_2' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
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
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 500]),
            'btn_text_1.required' => __('rules.required'),
            'btn_text_1.string' => __('rules.string'),
            'btn_text_1.max' => __('rules.max', ['max' => 255]),
            'btn_text_2.required' => __('rules.required'),
            'btn_text_2.string' => __('rules.string'),
            'btn_text_2.max' => __('rules.max', ['max' => 255]),
            'btn_url_1.required' => __('rules.required'),
            'btn_url_1.string' => __('rules.string'),
            'btn_url_1.max' => __('rules.max', ['max' => 255]),
            'btn_url_2.required' => __('rules.required'),
            'btn_url_2.string' => __('rules.string'),
            'btn_url_2.max' => __('rules.max', ['max' => 255]),
            'btn_icon_1.image' => __('rules.image'),
            'btn_icon_1.mimes' => __('rules.mimes', ['mimes' => 'png,jpg,jpeg']),
            'btn_icon_1.max' => __('rules.file_max', ['max' => 2048]),
            'btn_icon_2.image' => __('rules.image'),
            'btn_icon_2.mimes' => __('rules.mimes', ['mimes' => 'png,jpg,jpeg']),
            'btn_icon_2.max' => __('rules.file_max', ['max' => 2048]),
            'image_1.image' => __('rules.image'),
            'image_1.mimes' => __('rules.mimes', ['mimes' => 'png,jpg,jpeg']),
            'image_1.max' => __('rules.file_max', ['max' => 2048]),
            'image_2.image' => __('rules.image'),
            'image_2.mimes' => __('rules.mimes', ['mimes' => 'png,jpg,jpeg']),
            'image_2.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'description' => __('attribute.description'),
            'btn_text_1' => __('attribute.btn_text_1'),
            'btn_text_2' => __('attribute.btn_text_2'),
            'btn_url_1' => __('attribute.btn_url_1'),
            'btn_url_2' => __('attribute.btn_url_2'),
            'btn_icon_1' => __('attribute.btn_icon_1'),
            'btn_icon_2' => __('attribute.btn_icon_2'),
            'image_1' => __('attribute.image_1'),
            'image_2' => __('attribute.image_2'),
        ];
    }
}
