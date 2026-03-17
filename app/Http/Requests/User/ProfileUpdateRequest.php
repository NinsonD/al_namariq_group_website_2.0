<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required","string","max:255"],
            "email" => ["required","email","max:255"],
            "designation" => ["required","string","max:255"],
            "phone" => ["required","string","max:255"],
            "address" => ["required","string","max:255"],
            "zip_code" => ["required","string","max:255"],
            "bio" => ["required", "max:1000"],
            "status" => ["required","string","in:active,inactive"],
            "avatar" => ["nullable","image","mimes:jpg,jpeg,png","max:2048"],
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => __('rules.required', ['attribute' => __('attribute.name')]),
            "name.string" => __('rules.string', ['attribute' => __('attribute.name')]),
            "name.max" => __('rules.max', ['attribute' => __('attribute.name'), 'max' => 255]),
            "email.required" => __('rules.required', ['attribute' => __('attribute.email')]),
            "email.email" => __('rules.email', ['attribute' => __('attribute.email')]),
            "email.max" => __('rules.max', ['attribute' => __('attribute.email'), 'max' => 255]),
            "designation.required" => __('rules.required', ['attribute' => __('attribute.designation')]),
            "designation.string" => __('rules.string', ['attribute' => __('attribute.designation')]),
            "designation.max" => __('rules.max', ['attribute' => __('attribute.designation'), 'max' => 255]),
            "phone.required" => __('rules.required', ['attribute' => __('attribute.phone')]),
            "phone.string" => __('rules.string', ['attribute' => __('attribute.phone')]),
            "phone.max" => __('rules.max', ['attribute' => __('attribute.phone'), 'max' => 255]),
            "address.required" => __('rules.required', ['attribute' => __('attribute.address')]),
            "address.string" => __('rules.string', ['attribute' => __('attribute.address')]),
            "address.max" => __('rules.max', ['attribute' => __('attribute.address'), 'max' => 255]),
            "zip_code.required" => __('rules.required', ['attribute' => __('attribute.zip_code')]),
            "zip_code.string" => __('rules.string', ['attribute' => __('attribute.zip_code')]),
            "zip_code.max" => __('rules.max', ['attribute' => __('attribute.zip_code'), 'max' => 255]),
            "bio.required" => __('rules.required', ['attribute' => __('attribute.bio')]),
            "bio.max" => __('rules.max', ['attribute' => __('attribute.bio'), 'max' => 1000]),
            "status.required" => __('rules.required', ['attribute' => __('attribute.status')]),
            "status.string" => __('rules.string', ['attribute' => __('attribute.status')]),
            "status.in" => __('rules.exists', ['attribute' => __('attribute.status')]),
            "avatar.image" => __('rules.image', ['attribute' => __('attribute.avatar')]),
            "avatar.mimes" => __('rules.mimes', ['attribute' => __('attribute.avatar'), 'mimes' => 'jpg,jpeg,png']),
            "avatar.max" => __('rules.max', ['attribute' => __('attribute.avatar'), 'max' => 2048]),
        ];
    }
}
