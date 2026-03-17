<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
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
            'blog_category_id' => ['sometimes', 'exists:blog_categories,id'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:2000'],
            'tags' => ['nullable', 'string', 'max:2000'],
            'show_homepage' => ['nullable'],
            'short_description' => ['required', 'string'],
            'description' => ['required', 'string'],
            'title' => ['required', 'string', 'max:255'],
        ];

        if ($this->isMethod('post')) {
            $rules['image'] = ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
            $rules['slug'] = ['required', 'string', 'max:255', 'unique:blogs,slug'];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
            $rules['slug'] = ['required', 'string', 'max:255', 'unique:blogs,slug,' . $this->route('blog')];
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'blog_category_id.exists' => __('rules.exists'),
            'blog_category_id.required' => __('rules.required'),
            'seo_title.string' => __('rules.string'),
            'seo_title.max' => __('rules.max', ['max' => 255]),
            'seo_description.string' => __('rules.string'),
            'seo_description.max' => __('rules.max', ['max' => 2000]),
            'tags.string' => __('rules.string'),
            'tags.max' => __('rules.max', ['max' => 2000]),
            'short_description.required' => __('rules.required'),
            'short_description.string' => __('rules.string'),
            'description.required' => __('rules.required'),
            'description.string' => __('rules.string'),
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),
            'slug.required' => __('rules.required'),
            'slug.string' => __('rules.string'),
            'slug.max' => __('rules.max', ['max' => 255]),
            'slug.unique' => __('rules.unique'),
            'image.required' => __('rules.required'),
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes'),
            'image.max' => __('rules.file_max', ['max' => 2048]),
        ];
    }

    public function attributes(): array
    {
        return [
            'blog_category_id' => __('attribute.blog_category_id'),
            'seo_title' => __('attribute.seo_title'),
            'seo_description' => __('attribute.seo_description'),
            'tags' => __('attribute.tags'),
            'show_homepage' => __('attribute.show_homepage'),
            'short_description' => __('attribute.short_description'),
            'description' => __('attribute.description'),
            'title' => __('attribute.title'),
            'slug' => __('attribute.slug'),
            'image' => __('attribute.image'),
        ];
    }
}
