<?php

namespace Modules\Installer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Installer\Traits\NetworkTrait;

class DatabaseRequest extends FormRequest
{

    use NetworkTrait;

    /**
     * Determine if the user is authorized to make this request.
    */
    public function authorize(): bool
    {
        return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {

        $rules = [
            'db_host' => ['required', 'string'],
            'db_name' => ['required', 'string'],
            'db_username' => ['required', 'string'],
            'db_port' => ['required', 'numeric'],
            'db_password' => !$this->requestFromLocalClient() ? ['required', 'string'] : ['nullable', 'string'],
            'database_seed' => ['required', 'string', 'in:fresh,dummy'],
        ];

        return $rules;
    }


    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'db_host' => __('admin.database_host'),
            'db_name' => __('admin.database_name'),
            'db_username' => __('admin.database_username'),
            'db_password' => __('admin.database_password'),
            'db_port' => __('admin.database_port'),
            'database_seed' => __('admin.database_seed'),
        ];
    }


    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'db_host.required' => __('rules.required'),
            'db_host.string' => __('rules.string'),
            'db_name.required' => __('rules.required'),
            'db_name.string' => __('rules.string'),
            'db_username.required' => __('rules.required'),
            'db_username.string' => __('rules.string'),
            'db_password.required' => __('rules.required'),
            'db_password.string' => __('rules.string'),
            'db_port.required' => __('rules.required'),
            'db_port.numeric' => __('rules.numeric'),
            'database_seed.required' => __('rules.required'),
            'database_seed.string' => __('rules.string'),
            'database_seed.in' => __('rules.exists'),
        ];
    }

}
