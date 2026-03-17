<?php

namespace Modules\Frontend\Http\Requests\HomeMain;

use Illuminate\Foundation\Http\FormRequest;

class ServicesSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'services_item_bg' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'services' => 'nullable|array',
            'services.*' => 'nullable|exists:services,id',
            'code' => 'required|string|exists:languages,code',
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
            'title' => __('attribute.title'),
            'subtitle' => __('attribute.subtitle'),
            'services_item_bg' => __('attribute.services_item_bg'),
            'services' => __('attribute.services'),
            'code'=> __('attribute.language_code'),
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'services_item_bg.image' => __('rules.image'),
            'services_item_bg.mimes' => __('rules.mimes', ['values' => 'jpg,jpeg,png']),
            'services_item_bg.max' => __('rules.max_size', ['max' => 2048]),
            'services.array' => __('rules.array'),
            'services.*.exists' => __('rules.exists', ['attribute' => __('attribute.services')]),
            'code.required' => __('rules.required'),
            'code.string' => __('rules.string'),
            'code.exists' => __('rules.exists', ['attribute' => __('attribute.language_code')]),
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'services' => $this->has('services') ? $this->input('services') : [],
        ]);
    }
}
