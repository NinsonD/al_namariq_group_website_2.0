<?php

namespace Modules\Frontend\Http\Requests\HomeShop;

use Illuminate\Foundation\Http\FormRequest;

class InstagramSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'instagrams' => 'nullable|array',
            'instagrams.*' => 'nullable|exists:instagrams,id',
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
            'subtitle.string' => __('rules.string'),
            'subtitle.max' => __('rules.max', ['max' => 255]),
            'instagrams.*.exists' => __('rules.exists'),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'subtitle' => __('attribute.subtitle'),
            'instagrams' => __('attribute.instagrams'),
        ];
    }

}
