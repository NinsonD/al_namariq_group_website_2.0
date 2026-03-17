<?php

namespace Modules\Frontend\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $key = $this->route('key');

        return [
            "name_{$key}" => ['sometimes', 'string', 'max:255'],
            "phone_{$key}" => ['sometimes', 'string', 'max:20'],
            "email_{$key}" => ['sometimes', 'email', 'max:255'],
            "address_{$key}" => ['sometimes', 'string', 'max:255'],
            "address_link_{$key}" => ['sometimes', 'string', 'max:255'],
            "contact_{$key}" => ['sometimes', 'image', 'max:2048'],
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
        $key = $this->route('key');

        return [
            "name_{$key}.string"        => __('rules.string'),
            "name_{$key}.max"           => __('rules.max', ['max' => 255]),
            "phone_{$key}.string"       => __('rules.string'),
            "phone_{$key}.max"          => __('rules.max', ['max' => 20]),
            "email_{$key}.email"        => __('rules.email'),
            "email_{$key}.max"          => __('rules.max', ['max' => 255]),
            "address_{$key}.string"     => __('rules.string'),
            "address_{$key}.max"        => __('rules.max', ['max' => 255]),
            "address_link_{$key}.string"=> __('rules.string'),
            "address_link_{$key}.max"   => __('rules.max', ['max' => 255]),
            "contact_{$key}.image"      => __('rules.image'),
            "contact_{$key}.max"        => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        $key = $this->route('key');

        return [
            "name_{$key}"         => __('attribute.name'),
            "phone_{$key}"        => __('attribute.phone'),
            "email_{$key}"        => __('attribute.email'),
            "address_{$key}"      => __('attribute.address'),
            "address_link_{$key}" => __('attribute.address_link'),
            "contact_{$key}"      => __('attribute.image'),
        ];
    }

}
