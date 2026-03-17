<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class BreadcrumbUpdateRequest extends FormRequest
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
        $fields = ['breadcrumb_image', 'breadcrumb_image_services', 'breadcrumb_image_team'];

        $rules = collect($fields)->mapWithKeys(fn($field) => [
            $field => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048']
        ])->toArray();

        return $rules;
    }

    public function messages(): array
    {
        $fields = ['breadcrumb_image', 'breadcrumb_image_services', 'breadcrumb_image_team'];

        $messages = collect($fields)->flatMap(fn($field) => [
            "$field.image" => __('rules.image'),
            "$field.mimes" => __('rules.mimes'),
            "$field.max" => __('rules.file_max', ['max' => 2048]),
        ])->toArray();

        return $messages;
    }

    public function attributes(): array
    {
        return [
            'breadcrumb_image' => __('attribute.breadcrumb_image'),
            'breadcrumb_image_services' => __('attribute.breadcrumb_image_services'),
            'breadcrumb_image_team' => __('attribute.breadcrumb_image_team'),
        ];
    }
}
