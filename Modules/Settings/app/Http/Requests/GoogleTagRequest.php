<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GoogleTagRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'google_tagmanager_id' => ['required', 'string', 'max:255'],
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
            'google_tagmanager_id.required' => __('rules.required'),
            'google_tagmanager_id.string' => __('rules.string'),
            'google_tagmanager_id.max' => __('rules.max', ['max'=> 255]),
        ];
    }
    public function attributes(): array
    {
        return [
            'google_tagmanager_id' => __('attribute.google_tagmanager_id'),
        ];
    }
}
