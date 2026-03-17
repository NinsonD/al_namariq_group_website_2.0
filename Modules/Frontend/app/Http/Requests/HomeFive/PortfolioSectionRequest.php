<?php

namespace Modules\Frontend\Http\Requests\HomeFive;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'btn_url' => 'nullable|string|max:255',
            'btn_text' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'view_demo' => 'nullable|string|max:255',
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

    public function attributes(): array
    {
        return [
            'btn_url' => __('attribute.btn_url'),
            'btn_text' => __('attribute.btn_text'),
            'subtitle' => __('attribute.subtitle'),
            'view_demo' => __('attribute.view_demo'),
            'portfolios' => __('attribute.portfolios'),
            'portfolios.*' => __('attribute.portfolios'),
        ];
    }

    public function messages(): array
    {
        return [
            'btn_url.string' => __('rules.string'),
            'btn_url.max' => __('rules.max', ['max' => 255]),

            'btn_text.string' => __('rules.string'),
            'btn_text.max' => __('rules.max', ['max' => 255]),

            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),

            'view_demo.string' => __('rules.string'),
            'view_demo.max' => __('rules.max', ['max' => 255]),

            'portfolios.array' => __('rules.array'),
            'portfolios.*.exists' => __('rules.exists', ['attribute' => __('attribute.portfolios')]),
        ];
    }
}
