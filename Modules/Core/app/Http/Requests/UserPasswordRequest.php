<?php

namespace Modules\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'password' => ['required','string','min:8','confirmed']
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
            'password.required' => __('rules.required'),
            'password.string' => __('rules.string'),
            'password.min' => __('rules.min', ['min' => 8]),
            'password.confirmed' => __('rules.confirmed'),
        ];
    }

    public function attributes(): array
    {
        return [
            'password' => __('admin.password'),
        ];
    }
}
