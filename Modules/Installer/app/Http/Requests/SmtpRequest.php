<?php

namespace Modules\Installer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SmtpRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'mail_host' => ['required', 'string', 'max:255'],
            'mail_port' => ['required', 'integer'],
            'smtp_username' => ['required', 'string', 'max:255'],
            'smtp_password' => ['required', 'string', 'max:255'],
            'mail_encryption' => ['required', 'string', 'in:ssl,tls'],
            'mail_sender_email' => ['required', 'email', 'max:255'],
            'mail_sender_name' => ['required', 'string', 'max:255'],
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
            'mail_host.required' => __('rules.required'),
            'mail_host.string' => __('rules.string'),
            'mail_host.max' => __('rules.max', ['max'=> 255]),
            'mail_port.required' => __('rules.required'),
            'mail_port.integer' => __('rules.integer'),
            'smtp_username.required' => __('rules.required'),
            'smtp_username.string' => __('rules.string'),
            'smtp_username.max' => __('rules.max', ['max'=> 255]),
            'smtp_password.required' => __('rules.required'),
            'smtp_password.string' => __('rules.string'),
            'smtp_password.max' => __('rules.max', ['max'=> 255]),
            'mail_encryption.required' => __('rules.required'),
            'mail_encryption.string' => __('rules.string'),
            'mail_encryption.in' => __('rules.exists'),
            'mail_sender_email.required' => __('rules.required'),
            'mail_sender_email.email' => __('rules.email'),
            'mail_sender_email.max' => __('rules.max', ['max'=> 255]),
            'mail_sender_name.required' => __('rules.required'),
            'mail_sender_name.string' => __('rules.string'),
            'mail_sender_name.max' => __('rules.max', ['max'=> 255]),
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'mail_host' => __('attribute.mail_host'),
            'mail_port' => __('attribute.mail_port'),
            'smtp_username' => __('attribute.mail_username'),
            'smtp_password' => __('attribute.mail_password'),
            'mail_encryption' => __('attribute.mail_encryption'),
            'mail_sender_email' => __('attribute.mail_sender_email'),
            'mail_sender_name' => __('attribute.mail_sender_name'),
        ];
    }
}
