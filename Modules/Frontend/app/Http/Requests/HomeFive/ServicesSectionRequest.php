<?php

namespace Modules\Frontend\Http\Requests\HomeFive;

use Illuminate\Foundation\Http\FormRequest;

class ServicesSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'services' => 'nullable|array',
            'services.*' => 'nullable|exists:services,id',
            'subtitle' => 'nullable|string|max:255',
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
            'services' => __('attribute.services'),
            'subtitle' => __('attribute.subtitle'),
        ];
    }

    public function messages(): array
    {
        return [
            'services.array' => __('rules.array'),
            'services.*.exists' => __('rules.exists', ['attribute' => __('attribute.services')]),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
        ];
    }
}
