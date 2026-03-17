<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'permissions' => ['nullable', 'array'],
        ];

        if($this->isMethod('put')) {
            $rules['name'] = ['required', 'string', 'max:255', 'unique:roles,name,' . $this->route('role')];
        }
        if($this->isMethod('post')) {
            $rules['name'] = ['required', 'string', 'max:255', 'unique:roles'];
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
            'name.unique' => __('rules.unique'),
            'permissions.array' => __('rules.array'),
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('attribute.name'),
            'permissions' => __('attribute.permissions'),
        ];
    }
}
