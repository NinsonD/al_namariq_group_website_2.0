<?php

namespace Modules\Service\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'category' => ['nullable', 'string', 'max:255'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_keywords' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
            'tags' => ['nullable', 'string'],
        ];

        if ($this->isMethod('post')) {
            $rules['image'] = ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
            $rules['icon'] = ['required', 'image', 'mimes:jpeg,png,jpg', 'max:1024'];
            $rules['slug'] = ['required', 'string', 'max:255', 'unique:services'];
        }

        if( $this->isMethod('put') || $this->isMethod('patch')) {
            $rules['image'] = ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
            $rules['icon'] = ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:1024'];
            $rules['slug'] = ['required', 'string', 'max:255', 'unique:services,slug,' . $this->route('service')];
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
            'short_description.required' => __('rules.required'),
            'short_description.string' => __('rules.string'),
            'short_description.max' => __('rules.max', ['max'=> 255]),
            'description.required' => __('rules.required'),
            'description.string' => __('rules.string'),
            'category.string' => __('rules.string'),
            'category.max' => __('rules.max', ['max'=> 255]),
            'seo_title.string' => __('rules.string'),
            'seo_title.max' => __('rules.max', ['max'=> 255]),
            'seo_keywords.string' => __('rules.string'),
            'seo_keywords.max' => __('rules.max', ['max'=> 255]),
            'seo_description.string' => __('rules.string'),
            'image.required' => __('rules.required'),
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes'),
            'image.max' => __('rules.file_max', ['max' => 2048]),
            'icon.required' => __('rules.required'),
            'icon.image' => __('rules.image'),
            'icon.mimes' => __('rules.mimes'),
            'icon.max' => __('rules.file_max', ['max'=> 1024]),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'slug' => __('attribute.slug'),
            'short_description' => __('attribute.short_description'),
            'description' => __('attribute.description'),
            'category' => __('attribute.category'),
            'image' => __('attribute.image'),
            'icon' => __('attribute.icon'),
            'seo_title' => __('attribute.seo_title'),
            'seo_keywords' => __('attribute.seo_keywords'),
            'seo_description' => __('attribute.seo_description'),
        ];
    }
}
