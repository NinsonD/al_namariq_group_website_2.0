<?php

namespace Modules\ContactMessage\Http\Requests;

use App\Rules\CustomRecaptcha;
use Illuminate\Foundation\Http\FormRequest;

class ContactMessageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $settings = cache()->get('setting');
        return [
            "name" => ['required', 'string', 'max:255'],
            "email" => ['required', 'email', 'max:255'],
            "subject" => ['required', 'string', 'max:255'],
            "message" => ['required', 'string'],
            "g-recaptcha-response" => $settings?->recaptcha_status == 1 ? ['required', new CustomRecaptcha()] : '',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array    {
        return [
            'name.required' => __('rules.required'),
            'name.string' => __('rules.string'),
            'name.max' => __('rules.max', ['max' => 255]),
            'email.required' => __('rules.required'),
            'email.email' => __('rules.email'),
            'email.max' => __('rules.max', ['max'=> 255]),
            'subject.required' => __('rules.required'),
            'subject.string' => __('rules.string'),
            'subject.max' => __('rules.max', ['max'=> 255]),
            'message.required' => __('rules.required'),
            'message.string' => __('rules.string'),
            'g-recaptcha-response.required' => __('rules.required'),
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('attribute.name'),
            'email'=> __('attribute.email'),
            'subject' => __('attribute.subject'),
            'message'=> __('attribute.message'),
        ];
    }

}
