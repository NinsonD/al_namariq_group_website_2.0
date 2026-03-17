<?php

namespace Modules\Brand\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            "title" => ['required', 'string', 'max:255'],
            "url" => ['nullable', 'string', 'max:255'],
            "image" => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
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
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'url.string' => __('rules.string'),
            'url.max' => __('rules.max', ['max' => 255]),
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes'),
            'image.max' => __('rules.file_max'),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'url' => __('attribute.url'),
            'image' => __('attribute.image'),
            'status' => __('attribute.status'),
        ];
    }
}
