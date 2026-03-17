<?php

namespace Modules\Shop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstagramRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'link' => 'nullable|string|max:255',
            'image' => $this->isMethod('post') ? 'required|image|mimes:jpeg,png,jpg|max:2048' : 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
            'image.required' => __('rules.required'),
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'image.max' => __('rules.file_max', ['max' => '2MB']),
            'link.string' => __('rules.string'),
            'link.max' => __('rules.max', ['max' => 255]),
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => __('attribute.image'),
            'link' => __('attribute.link'),
        ];
    }
}
