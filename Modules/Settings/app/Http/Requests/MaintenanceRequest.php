<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MaintenanceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'maintenance_title' => ['required', 'string', 'max:255'],
            'maintenance_description' => ['required', 'string'],
            'maintenance_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
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
            'maintenance_title.required' => __('rules.required'),
            'maintenance_title.string' => __('rules.string'),
            'maintenance_title.max' => __('rules.max', ['max'=> 255]),
            'maintenance_description.required' => __('rules.required'),
            'maintenance_description.string' => __('rules.string'),
            'maintenance_image.image' => __('rules.image'),
            'maintenance_image.mimes' => __('rules.mimes'),
            'maintenance_image.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        return [
            'maintenance_title' => __('attribute.maintenance_title'),
            'maintenance_description' => __('attribute.maintenance_description'),
            'maintenance_image' => __('attribute.maintenance_image'),
        ];
    }
}
