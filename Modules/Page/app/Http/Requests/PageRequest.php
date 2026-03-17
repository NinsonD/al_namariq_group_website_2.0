<?php

namespace Modules\Page\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['nullable', 'string'],
        ];

        if ($this->isMethod('post')) {
            $rules['slug'] = ['required', 'string', 'max:255', 'unique:pages'];
        }
        if ($this->isMethod('put')) {
            $rules['slug'] = ['sometimes', 'string', 'max:255', 'unique:pages,slug,' . $this->route('page')];
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
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max'=> 255]),
            'slug.required' => __('rules.required'),
            'slug.string' => __('rules.string'),
            'slug.max' => __('rules.max', ['max'=> 255]),
            'slug.unique' => __('rules.unique'),
            'content.string' => __('rules.string'),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'slug' => __('attribute.slug'),
            'status' => __('attribute.status'),
            'content' => __('attribute.content'),
        ];
    }
}
