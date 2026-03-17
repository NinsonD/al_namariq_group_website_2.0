<?php

namespace Modules\Frontend\Http\Requests\HomeMain;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioSectionRequest extends FormRequest
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
            'description' => 'nullable|string|max:500',
            'portfolios' => 'nullable|array',
            'portfolios.*' => 'nullable|exists:portfolios,id',
        ];
    }

    public function attributes(): array
    {
        return [
            'code' => __('attribute.language_code'),
            'title'=> __('attribute.title'),
            'description' => __('attribute.description'),
            'portfolios' => __('attribute.portfolios'),
            'portfolios.*' => __('attribute.portfolios'),
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
            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 500]),
            'portfolios.array' => __('rules.array'),
            'portfolios.*.exists' => __('rules.exists', ['attribute' => __('attribute.portfolios')]),
        ];
    }
}
