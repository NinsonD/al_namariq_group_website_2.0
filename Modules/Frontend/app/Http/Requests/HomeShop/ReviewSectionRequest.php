<?php

namespace Modules\Frontend\Http\Requests\HomeShop;

use Illuminate\Foundation\Http\FormRequest;

class ReviewSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
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
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
        ];
    }
}
