<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
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
            'current_password' => ['required','string','min:8','max:255'],
            'password' => ['required','string','min:8','max:255','confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'current_password.required' => __('rules.required', ['attribute' => __('attribute.current_password')]),
            'current_password.string' => __('rules.string', ['attribute' => __('attribute.current_password')]),
            'current_password.min' => __('rules.min', ['attribute' => __('attribute.current_password'), 'min' => 8]),
            'current_password.max' => __('rules.max', ['attribute' => __('attribute.current_password'), 'max' => 255]),
            'password.required' => __('rules.required', ['attribute' => __('attribute.password')]),
            'password.string' => __('rules.string', ['attribute' => __('attribute.password')]),
            'password.min' => __('rules.min', ['attribute' => __('attribute.password'), 'min' => 8]),
            'password.max' => __('rules.max', ['attribute' => __('attribute.password'), 'max' => 255]),
            'password.confirmed' => __('rules.confirmed', ['attribute' => __('attribute.password')]),
        ];
    }
}
