<?php

namespace Modules\Frontend\Http\Requests\HomeSix;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
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
            'portfolios' => __('attribute.portfolios'),
            'portfolios.*' => __('attribute.portfolios'),
        ];
    }

    public function messages(): array
    {
        return [
            'portfolios.array' => __('rules.array'),
            'portfolios.*.exists' => __('rules.exists', ['attribute' => __('attribute.portfolios')]),
        ];
    }
}
