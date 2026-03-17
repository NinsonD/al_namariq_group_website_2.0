<?php

namespace Modules\Menu\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'menu_title' => ['required', 'string', 'max:255'],
            'menu_data' => ['required', 'json'],
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
            'menu_title.required' => __('rules.required'),
            'menu_title.string' => __('rules.string'),
            'menu_title.max' => __('rules.max', ['max'=> 255]),
            'menu_data.required' => __('rules.required'),
            'menu_data.json' => __('rules.json'),
        ];
    }

    public function attributes(): array
    {
        return [
            'menu_title' => __('attribute.menu_title'),
            'menu_data' => __('attribute.menu_data'),
        ];
    }
}
