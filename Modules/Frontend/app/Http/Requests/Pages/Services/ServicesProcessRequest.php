<?php

namespace Modules\Frontend\Http\Requests\Pages\Services;

use Illuminate\Foundation\Http\FormRequest;

class ServicesProcessRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'video_url' => 'nullable|string|max:255',
            'process_title_1' => 'nullable|string|max:255',
            'process_title_2' => 'nullable|string|max:255',
            'process_title_3' => 'nullable|string|max:255',
            'process_title_4' => 'nullable|string|max:255',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'subtitle' => __('attribute.subtitle'),
            'title' => __('attribute.title'),
            'description' => __('attribute.description'),
            'image' => __('attribute.image'),
            'video_url' => __('attribute.video_url'),
            'process_title_1' => __('attribute.process_title_1'),
            'process_title_2' => __('attribute.process_title_2'),
            'process_title_3' => __('attribute.process_title_3'),
            'process_title_4' => __('attribute.process_title_4'),
        ];
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
            'description.required' => __('rules.required'),
            'description.string' => __('rules.string'),
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes', ['mimes' => 'jpg,jpeg,png']),
            'image.max' => __('rules.max_size', ['max' => 2048]),
            'video_url.string' => __('rules.string'),
            'video_url.max' => __('rules.max', ['max' => 255]),
            'process_title_1.string' => __('rules.string'),
            'process_title_1.max' => __('rules.max', ['max' => 255]),
            'process_title_2.string' => __('rules.string'),
            'process_title_2.max' => __('rules.max', ['max' => 255]),
            'process_title_3.string' => __('rules.string'),
            'process_title_3.max' => __('rules.max', ['max' => 255]),
            'process_title_4.string' => __('rules.string'),
            'process_title_4.max' => __('rules.max', ['max' => 255])
        ];
    }
}
