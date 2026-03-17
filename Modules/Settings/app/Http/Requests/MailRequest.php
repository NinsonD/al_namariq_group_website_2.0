<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'mail_sender_name' => ['required', 'string', 'max:255'],
            'mail_sender_email' => ['required', 'string', 'email', 'max:255'],
            'mail_host' => ['required', 'string', 'max:255'],
            'mail_username' => ['required', 'string', 'max:255'],
            'mail_password' => ['required', 'string', 'max:255'],
            'mail_port' => ['required', 'string', 'max:255'],
            'mail_encryption' => ['required', 'string', 'in:ssl,tls'],

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
            'mail_sender_name.required' => __('rules.required'),
            'mail_sender_name.string' => __('rules.string'),
            'mail_sender_name.max' => __('rules.max', ['max'=> 255]),
            'mail_sender_email.required' => __('rules.required'),
            'mail_sender_email.string' => __('rules.string'),
            'mail_sender_email.email' => __('rules.email'),
            'mail_sender_email.max' => __('rules.max', ['max'=> 255]),
            'mail_host.required' => __('rules.required'),
            'mail_host.string' => __('rules.string'),
            'mail_host.max' => __('rules.max', ['max'=> 255]),
            'mail_username.required' => __('rules.required'),
            'mail_username.string' => __('rules.string'),
            'mail_username.max' => __('rules.max', ['max'=> 255]),
            'mail_password.required' => __('rules.required'),
            'mail_password.string' => __('rules.string'),
            'mail_password.max' => __('rules.max', ['max'=> 255]),
            'mail_port.required' => __('rules.required'),
            'mail_port.string' => __('rules.string'),
            'mail_port.max' => __('rules.max', ['max'=> 255]),
            'mail_encryption.required' => __('rules.required'),
            'mail_encryption.string' => __('rules.string'),
            'mail_encryption.in' => __('rules.exists'),
        ];
    }

    public function attributes(): array
    {
        return [
            'mail_sender_name' => __('attribute.mail_sender_name'),
            'mail_sender_email' => __('attribute.mail_sender_email'),
            'mail_host' => __('attribute.mail_host'),
            'mail_username' => __('attribute.mail_username'),
            'mail_password' => __('attribute.mail_password'),
            'mail_port' => __('attribute.mail_port'),
            'mail_encryption' => __('attribute.mail_encryption'),
        ];
    }
}
