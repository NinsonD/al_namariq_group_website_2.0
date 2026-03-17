<?php

namespace Modules\Portfolio\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'title' => ['required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'client' => ['nullable', 'string', 'max:255'],
            'service' => ['nullable', 'string', 'max:255'],
            'duration' => ['nullable', 'string', 'max:255'],
            'website' => ['nullable', 'string', 'max:255'],
            'website_url' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'integer'],
            'tags' => ['nullable', 'string'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_keywords' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string'],
        ];

        if($this->isMethod('post')) {
            $rules['slug'] = ['required', 'string', 'max:255', 'unique:portfolios'];
            $rules['image'] = ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
        }
        if($this->isMethod('put')) {
            $rules['slug'] = ['required', 'string', 'max:255', 'unique:portfolios,slug,' . $this->route('portfolio')];
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
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max'=> 255]),
            'slug.required' => __('rules.required'),
            'slug.string' => __('rules.string'),
            'slug.max' => __('rules.max', ['max'=> 255]),
            'slug.unique' => __('rules.unique'),
            'short_description.string' => __('rules.string'),
            'description.string' => __('rules.string'),
            'client.string' => __('rules.string'),
            'client.max' => __('rules.max', ['max'=> 255]),
            'service.string' => __('rules.string'),
            'service.max' => __('rules.max', ['max'=> 255]),
            'duration.string' => __('rules.string'),
            'duration.max' => __('rules.max', ['max'=> 255]),
            'website.string' => __('rules.string'),
            'website.max' => __('rules.max', ['max'=> 255]),
            'website_url.string' => __('rules.string'),
            'website_url.max' => __('rules.max', ['max'=> 255]),
            'tags.string' => __('rules.string'),
            'tags.max' => __('rules.max', ['max'=> 255]),
            'seo_title.string' => __('rules.string'),
            'seo_title.max' => __('rules.max', ['max'=> 255]),
            'seo_keywords.string' => __('rules.string'),
            'seo_keywords.max' => __('rules.max', ['max'=> 255]),
            'seo_description.string' => __('rules.string'),
            'image.required' => __('rules.required'),
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes'),
            'image.max' => __('rules.file_max', ['max' => 2048]),
            'year.integer' => __('rules.integer'),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'slug' => __('attribute.slug'),
            'short_description' => __('attribute.short_description'),
            'description' => __('attribute.description'),
            'client' => __('attribute.client'),
            'service' => __('attribute.service'),
            'duration' => __('attribute.duration'),
            'website' => __('attribute.website'),
            'tags' => __('attribute.tags'),
            'seo_title' => __('attribute.seo_title'),
            'seo_keywords' => __('attribute.seo_keywords'),
            'seo_description' => __('attribute.seo_description'),
            'image' => __('attribute.image'),
            'year' => __('attribute.year'),
            'website_url' => __('attribute.website_url'),
        ];
    }
}
