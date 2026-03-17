<?php

namespace Modules\Faqs\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'code' => ['required', 'string', 'max:20', 'exists:languages,code'],
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
            'question.required' => __('rules.required'),
            'question.string' => __('rules.string'),
            'question.max' => __('rules.max', ['max' => 255]),
            'answer.required' => __('rules.required'),
            'answer.string' => __('rules.string'),
            'code.required' => __('rules.required'),
            'code.exists' => __('rules.exists', ['attribute' => __('attribute.language')]),
            'code.string' => __('rules.string'),
            'code.max' => __('rules.max', ['max' => 20]),
        ];
    }

    public function attributes(): array
    {
        return [
            'question' => __('attribute.question'),
            'answer' => __('attribute.answer'),
            'code'=> __('attribute.language'),
        ];
    }
}
