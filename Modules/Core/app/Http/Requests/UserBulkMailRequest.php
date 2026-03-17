<?php

namespace Modules\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserBulkMailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'subject' => ['required','string','max:255'],
            'message' => ['required','string'],
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
            'subject.required' => __('rules.required'),
            'subject.string' => __('rules.string'),
            'subject.max' => __('rules.max', ['max' => 255]),
            'message.required' => __('rules.required'),
            'message.string' => __('rules.string'),
        ];
    }

    public function attributes(): array
    {
        return [
            'subject' => __('admin.subject'),
            'message' => __('admin.message'),
        ];
    }
}
