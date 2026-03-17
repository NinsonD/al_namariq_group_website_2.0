<?php

namespace Modules\Frontend\Http\Requests\HomeMain;

use Illuminate\Foundation\Http\FormRequest;

class BlogSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'code' => 'required|string|exists:languages,code',
            'title' => 'required|string|max:255',
            'btn_text' => 'nullable|string|max:255',
            'blogs' => 'nullable|array',
            'blogs.*' => 'nullable|exists:blogs,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'code' => __('attribute.language_code'),
            'title'=> __('attribute.title'),
            'btn_text' => __('attribute.btn_text'),
            'blogs' => __('attribute.blogs'),
            'blogs.*' => __('attribute.blogs'),
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => __('rules.required'),
            'code.string' => __('rules.string'),
            'code.exists' => __('rules.exists', ['attribute' => __('attribute.language_code')]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'btn_text.string' => __('rules.string'),
            'btn_text.max' => __('rules.max', ['max' => 255]),
            'blogs.array' => __('rules.array'),
            'blogs.*.exists' => __('rules.exists', ['attribute' => __('attribute.blogs')]),
        ];
    }
}
