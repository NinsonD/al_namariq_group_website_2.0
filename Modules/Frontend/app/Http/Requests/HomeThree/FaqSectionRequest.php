<?php

namespace Modules\Frontend\Http\Requests\HomeThree;

use Illuminate\Foundation\Http\FormRequest;

class FaqSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'shape' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'faqs' => 'nullable|array',
            'faqs.*' => 'nullable|exists:faqs,id',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
