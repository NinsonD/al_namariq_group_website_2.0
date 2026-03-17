<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'name.required' => __('rules.required', ['attribute' => __('attribute.name')]),
            'name.string' => __('rules.string', ['attribute' => __('attribute.name')]),
            'name.max' => __('rules.max', ['attribute' => __('attribute.name'), 'max' => 255]),
            'email.required' => __('rules.required', ['attribute' => __('attribute.email')]),
            'email.string' => __('rules.string', ['attribute' => __('attribute.email')]),
            'email.lowercase' => __('rules.lowercase', ['attribute' => __('attribute.email')]),
            'email.email' => __('rules.email', ['attribute' => __('attribute.email')]),
            'email.max' => __('rules.max', ['attribute' => __('attribute.email'), 'max' => 255]),
            'email.unique' => __('rules.unique', ['attribute' => __('attribute.email')]),
        ];
    }
}
