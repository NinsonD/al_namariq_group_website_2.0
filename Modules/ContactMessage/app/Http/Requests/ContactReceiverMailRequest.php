<?php

namespace Modules\ContactMessage\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactReceiverMailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'contact_message_receiver_mail' => ['required', 'email', 'max:255'],
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
            'contact_message_receiver_mail.required' => __('rules.required'),
            'contact_message_receiver_mail.email' => __('rules.email'),
            'contact_message_receiver_mail.max' => __('rules.max', ['max' => 255]),

        ];
    }

    public function attribues(): array
    {
        return [
            'contact_message_receiver_mail' => __('attribute.contact_receiver_mail')
        ];
    }
}
