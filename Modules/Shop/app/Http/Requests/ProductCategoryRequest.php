<?php

namespace Modules\Shop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules =  [
            'title' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'], // 2MB max
            'position' => ['nullable', 'integer'],
            'status' => ['nullable', 'boolean'],
            'parent_id' => ['nullable', 'exists:product_categories,id'],
        ];

        if($this->method() === 'POST') {
            $rules['slug'] = ['required', 'string', 'max:255', 'unique:product_categories,slug'];
        } else {
            $rules['slug'] = ['sometimes', 'string', 'max:255', 'unique:product_categories,slug,' . $this->route('product_category')];
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
            'slug.max' => __('rules.max', ['max' => 255]),
            'slug.unique' => __('rules.unique'),
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes', ['values' => 'jpeg,png,jpg']),
            'image.max' => __('rules.file_max', ['max' => 2048]),
            'position.integer' => __('rules.integer'),
            'status.boolean' => __('rules.boolean'),
            'parent_id.exists' => __('rules.exists'),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'slug' => __('attribute.slug'),
            'image' => __('attribute.image'),
            'position' => __('attribute.position'),
            'status' => __('attribute.status'),
            'parent_id' => __('attribute.parent_category'),
        ];
    }
}
