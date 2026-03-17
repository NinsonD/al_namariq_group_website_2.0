<?php

namespace Modules\Core\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required','string','max:255'],
        ];

        if($this->isMethod('post')) {
            $rules['email'] = ['required','string','email','max:255','unique:users'];
            $rules['username'] = ['required','string','max:255','unique:users'];
        }

        if($this->isMethod('put')) {
            $rules['email'] = ['required','string','email','max:255','unique:users,email,'.$this->route('user')];
            $rules['username'] = ['required','string','max:255','unique:users,username,'.$this->route('user')];
            $rules['status'] = ['required','string','in:active,inactive,suspended'];
            $rules['designation'] = ['nullable','string','max:255'];
            $rules['phone'] = ['nullable','string','max:255'];
            $rules['address'] = ['nullable','string','max:255'];
            $rules['zip_code'] = ['nullable','string','max:255'];
            $rules['bio'] = ['nullable','string'];
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
            'name.max' => __('rules.max', ['max' => 255]),
            'email.required' => __('rules.required'),
            'email.string' => __('rules.string'),
            'email.email' => __('rules.email'),
            'email.max' => __('rules.max', ['max' => 255]),
            'email.unique' => __('rules.unique'),
            'username.required' => __('rules.required'),
            'username.string' => __('rules.string'),
            'username.max' => __('rules.max', ['max' => 255]),
            'username.unique' => __('rules.unique'),
            'status.required' => __('rules.required'),
            'status.string' => __('rules.string'),
            'status.in' => __('rules.exists'),
            'designation.string' => __('rules.string'),
            'designation.max' => __('rules.max', ['max' => 255]),
            'phone.string' => __('rules.string'),
            'phone.max' => __('rules.max', ['max' => 255]),
            'address.string' => __('rules.string'),
            'address.max' => __('rules.max', ['max' => 255]),
            'zip_code.string' => __('rules.string'),
            'zip_code.max' => __('rules.max', ['max' => 255]),
            'bio.string' => __('rules.string'),
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('attribute.name'),
            'email' => __('attribute.email'),
            'username' => __('attribute.username'),
            'status' => __('attribute.status'),
            'designation' => __('attribute.designation'),
            'phone' => __('attribute.phone'),
            'address' => __('attribute.address'),
            'zip_code' => __('attribute.zip_code'),
            'bio' => __('attribute.bio'),
        ];
    }
}
