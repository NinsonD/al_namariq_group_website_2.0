<?php

namespace Modules\Installer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',  function ($attribute, $value, $fail) {
                    // Allow admin@gmail.com even if it exists
                    if ($value !== 'admin@gmail.com' && \App\Models\User::where('email', $value)->exists()) {
                        $fail(__('rules.unique', ['attribute' => $attribute]));
                    }
                },],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => __('rules.required'),
            'name.string' => __('rules.string'),
            'name.max' => __('rules.max', ['max' => 255]),
            'email.required' => __('rules.required'),
            'email.string' => __('rules.string'),
            'email.email' => __('rules.email'),
            'email.unique' => __('rules.unique'),
            'password.required' => __('rules.required'),
            'password.min' => __('rules.min', ['min' => 8]),
            'password.confirmed' => __('rules.confirmed'),
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => __('attribute.name'),
            'email' => __('attribute.email'),
            'password' => __('attribute.password'),
        ];
    }
}
