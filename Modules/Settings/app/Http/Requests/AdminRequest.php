<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'roles' => ['nullable', 'array', 'exists:roles,name']
        ];

        if($this->isMethod('post')) {
            $rules['email']    = ['required', 'string', 'email', 'max:255', 'unique:users'];
            $rules['username'] = ['required', 'string', 'max:255', 'unique:users'];
        }

        if($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['email']    = ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $this->route('manage_admin')];
            $rules['username'] = ['required', 'string', 'max:255', 'unique:users,username,' . $this->route('manage_admin')];
        }

        if ($this->filled('password')) {
            $rules['password'] = ['required', 'string', 'min:8', 'confirmed'];
        }

        return $rules;
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
            'name.required' => __('rules.required'),
            'name.string' => __('rules.string'),
            'name.max' => __('rules.max', ['max'=> 255]),
            'email.required' => __('rules.required'),
            'email.string' => __('rules.string'),
            'email.email' => __('rules.email'),
            'email.max' => __('rules.max', ['max'=> 255]),
            'email.unique' => __('rules.unique'),
            'username.required' => __('rules.required'),
            'username.string' => __('rules.string'),
            'username.max' => __('rules.max', ['max'=> 255]),
            'username.unique' => __('rules.unique'),
            'roles.array' => __('rules.array'),
            'roles.exists' => __('rules.exists'),
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('attribute.name'),
            'email' => __('attribute.email'),
            'username' => __('attribute.username'),
            'roles' => __('attribute.roles'),
        ];
    }
}
