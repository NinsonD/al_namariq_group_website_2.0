<?php

namespace Modules\Social\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocialRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'icon' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string', 'max:255'],
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
            'icon.required' => __('rules.required'),
            'icon.string' => __('rules.string'),
            'icon.max' => __('rules.max', ['max'=> 255]),
            'link.required' => __('rules.required'),
            'link.string' => __('rules.string'),
            'link.max' => __('rules.max', ['max'=> 255]),
        ];
    }

    public function attributes(): array
    {
        return [
            'icon' => __('attribute.icon_class'),
            'link' => __('attribute.link'),
        ];
    }
}
