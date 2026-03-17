<?php

namespace Modules\Team\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'qualification' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'age' => ['nullable', 'integer', 'min:1'],
            'gender' => ['nullable', 'string', 'in:male,female,other'],
            'social' => ['nullable', 'array'],
            'social.*.url' => ['nullable', 'string', 'max:255'],
            'social.*.icon' => ['nullable', 'string', 'max:255'],
            'skills' => ['nullable', 'array'],
            'skills.*.title' => ['nullable', 'string', 'max:255'],
            'skills.*.level' => ['nullable', 'integer', 'min:1', 'max:100'],
            'bio' => ['nullable', 'string'],
        ];

        if ($this->isMethod('post')) {
            $rules['username'] = ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\-]+$/', 'unique:teams'];
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:teams'];
            $rules['image'] = ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['username'] = ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\-]+$/', 'unique:teams,username,' . $this->route('team')];
            $rules['email'] = ['required', 'string', 'email', 'max:255', 'unique:teams,email,' . $this->route('team')];
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
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
            'username.required' => __('rules.required'),
            'username.string' => __('rules.string'),
            'username.max' => __('rules.max', ['max'=> 255]),
            'username.regex' => __('rules.regex_alpha'),
            'username.unique' => __('rules.unique'),
            'email.required' => __('rules.required'),
            'email.string' => __('rules.string'),
            'email.email' => __('rules.email'),
            'email.max' => __('rules.max', ['max'=> 255]),
            'email.unique' => __('rules.unique'),
            'designation.required' => __('rules.required'),
            'designation.string' => __('rules.string'),
            'designation.max' => __('rules.max', ['max'=> 255]),
            'phone.string' => __('rules.string'),
            'phone.max' => __('rules.max', ['max'=> 255]),
            'social.array' => __('rules.array'),
            'social.*.url.string' => __('rules.string'),
            'social.*.url.max' => __('rules.max', ['max'=> 255]),
            'social.*.icon.string' => __('rules.string'),
            'social.*.icon.max' => __('rules.max', ['max'=> 255]),
            'bio.string' => __('rules.string'),
            'image.required' => __('rules.required'),
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes'),
            'image.max' => __('rules.file_max', ['max' => 2048]),
            'qualification.string' => __('rules.string'),
            'qualification.max' => __('rules.max', ['max'=> 255]),
            'location.string' => __('rules.string'),
            'location.max' => __('rules.max', ['max'=> 255]),
            'age.integer' => __('rules.integer'),
            'age.min' => __('rules.min', ['min' => 1]),
            'gender.string' => __('rules.string'),
            'gender.in' => __('rules.in', ['values'=> implode(', ', ['male', 'female', 'other'] )]),
            'skills.array' => __('rules.array'),
            'skills.*.title.string' => __('rules.string'),
            'skills.*.title.max' => __('rules.max', ['max' => 255]),
            'skills.*.level.integer' => __('rules.integer'),
            'skills.*.level.min' => __('rules.min', ['min' => 1]),
            'skills.*.level.max' => __('rules.max', ['max' => 100]),
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('attribute.name'),
            'username' => __('attribute.username'),
            'email' => __('attribute.email'),
            'designation' => __('attribute.designation'),
            'phone' => __('attribute.phone'),
            'social' => __('attribute.social'),
            'bio' => __('attribute.bio'),
            'image' => __('attribute.image'),
            'qualification' => __('attribute.qualification'),
            'location' => __('attribute.location'),
            'age' => __('attribute.age'),
            'gender' =>  __('attribute.gender'),
        ];
    }
}
