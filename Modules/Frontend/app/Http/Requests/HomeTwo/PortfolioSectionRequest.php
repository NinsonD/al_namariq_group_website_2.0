<?php

namespace Modules\Frontend\Http\Requests\HomeTwo;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'portfolios' => 'nullable|array',
            'portfolios.*' => 'nullable|exists:portfolios,id',
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
            'subtitle.required' => __('rules.required'),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'portfolios.array' => __('rules.array'),
            'portfolios.*.exists' => __('rules.exists'),
        ];
    }

    public function attributes(): array
    {
        return [
            'subtitle' => __('attribute.subtitle'),
            'title' => __('attribute.title'),
            'portfolios' => __('attribute.portfolios'),
        ];
    }
}
