<?php

namespace Modules\Frontend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nav_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'btn_link' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'btn_text' => 'nullable|string|max:100',
        ];
        return $rules;
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
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image.max' => __('rules.file_max', ['max' => 2048]),
            'nav_image.image' => __('rules.image'),
            'nav_image.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'nav_image.max' => __('rules.file_max', ['max' => 2048]),
            'btn_link.string' => __('rules.string', ['max' => 255]),
            'btn_link.max' => __('rules.max', ['max' => 255]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'btn_text.string' => __('rules.string'),
            'btn_text.max' => __('rules.max', ['max' => 100]),
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => __('attribute.image'),
            'nav_image' => __('attribute.nav_image'),
            'btn_link' => __('attribute.btn_link'),
            'title' => __('attribute.title'),
            'subtitle' => __('attribute.subtitle'),
            'btn_text' => __('attribute.btn_text'),
        ];
    }
}
