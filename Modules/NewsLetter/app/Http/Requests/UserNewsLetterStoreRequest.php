<?php

namespace Modules\NewsLetter\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserNewsLetterStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'email' => ['required','email', 'unique:news_letters,email', 'max:255'],
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
            'email.required' => __('rules.required'),
            'email.email' => __('rules.email'),
            'email.max' => __('rules.max', ['max'=> 255]),
            'email.unique' => __('rules.email_already_exists'),
        ];
    }
    public function attributes(): array
    {
        return [
            'email' => __('attribute.email'),
        ];
    }
}
