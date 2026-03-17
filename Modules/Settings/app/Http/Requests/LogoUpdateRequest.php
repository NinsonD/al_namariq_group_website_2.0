<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogoUpdateRequest extends FormRequest
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
        $fields = ['logo', 'logo_white', 'logo_shop', 'favicon'];

        $rules = collect($fields)->mapWithKeys(fn($field) => [
            $field => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ])->toArray();

        if ($this->hasFile('favicon')) {
            $rules['favicon'] = ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
        }

        return $rules;
    }

    public function messages(): array
    {
        $fields = ['logo', 'logo_white', 'logo_shop', 'favicon'];

        $messages = collect($fields)->flatMap(fn($field) => [
            "$field.image" => __('rules.image', ['attribute' => $field]),
            "$field.mimes" => __('rules.mimes', ['attribute' => $field]),
            "$field.max" => __('rules.max', ['attribute' => $field]),
        ])->toArray();

        $messages += [
            'favicon.image' => __('rules.image'),
            'favicon.mimes' => __('rules.mimes'),
            'favicon.max' => __('rules.file_max', ['max' => 2048]),
        ];

        return $messages;
    }

    public function attributes(): array
    {
        return [
            'logo' => __('attribute.logo'),
            'logo_white' => __('attribute.logo_white'),
            'logo_shop' => __('attribute.logo_shop'),
            'favicon' => __('attribute.favicon'),
        ];
    }
}
