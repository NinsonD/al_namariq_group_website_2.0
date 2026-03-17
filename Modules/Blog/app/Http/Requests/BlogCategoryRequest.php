<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            "title" => ['required', 'string', 'max:255'],
            "parent_id" => ['nullable', 'integer'],
        ];

        if($this->isMethod('post')) {
            $rules['slug'] = ['required', 'string', 'max:255', 'unique:blog_categories'];
        }

        if($this->isMethod('put')) {
            $rules['slug'] = ['required', 'string', 'max:255', 'unique:blog_categories,slug,' . $this->route('blog_category')];
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
            'title.max' => __('rules.max', ['max' => 255]),
            'slug.required' => __('rules.required'),
            'slug.string' => __('rules.string'),
            'slug.unique' => __('rules.unique'),
            'parent_id.integer' => __('rules.integer'),
        ];
    }
    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'slug' => __('attribute.slug'),
            'parent_id' => __('attribute.parent_id'),
        ];
    }
}
