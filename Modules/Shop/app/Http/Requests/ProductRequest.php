<?php

namespace Modules\Shop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {

        return [
            'title' => ['required', 'string', 'max:255'],
            'product_category_id' => ['sometimes', 'exists:product_categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'qty' => ['sometimes', 'integer', 'min:0'],
            'price' => ['sometimes', 'numeric', 'min:0'],
            'sale_price' => [
                'nullable',
                'numeric',
                'min:0',
                function ($attribute, $value, $fail) {
                    $price = $this->input('price');
                    if ($value !== null && $price !== null && $value >= $price) {
                        $fail(__('rules.sale_price_must_be_less_than_price'));
                    }
                },
            ],
            'is_new' => ['nullable', 'boolean'],
            'is_popular' => ['nullable', 'boolean'],
            'status' => ['nullable', 'boolean'],
            'tags' => ['nullable', 'string', 'max:2000'],
            'description' => ['nullable', 'string', 'max:500'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],
            'slug' => $this->isMethod('post')
                ? ['required', 'string', 'max:255', 'unique:products,slug']
                : ['sometimes', 'string', 'max:255', 'unique:products,slug,' . $this->route('product')],
            'sku' => $this->isMethod('post')
                ? ['sometimes', 'string', 'max:255', 'unique:products,sku']
                : ['required', 'string', 'max:255', 'unique:products,sku,' . $this->route('product')],
            'additional_information' => ['nullable', 'array'],
            'additional_information.*.key' => ['nullable', 'string', 'max:255'],
            'additional_information.*.value' => ['nullable', 'string', 'max:255'],
        ];
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
            'product_category_id.required' => __('rules.required'),
            'product_category_id.exists' => __('rules.exists'),
            'image.image' => __('rules.image'),
            'image.mimes' => __('rules.mimes', ['values' => 'jpeg,png,jpg']),
            'image.max' => __('rules.file_max', ['max' => 2048]),
            'qty.required' => __('rules.required'),
            'qty.integer' => __('rules.integer'),
            'qty.min' => __('rules.min', ['min' => 0]),
            'price.required' => __('rules.required'),
            'price.numeric' => __('rules.numeric'),
            'price.min' => __('rules.min', ['min' => 0]),
            'sku.required' => __('rules.required'),
            'sku.string' => __('rules.string'),
            'sku.max' => __('rules.max', ['max' => 255]),
            'sku.unique' => __('rules.unique'),
            'tags.string' => __('rules.string'),
            'tags.max' => __('rules.max', ['max' => 2000]),
            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 500]),
            'short_description.string' => __('rules.string'),
            'short_description.max' => __('rules.max', ['max' => 500]),
            'seo_title.string' => __('rules.string'),
            'seo_title.max' => __('rules.max', ['max' => 255]),
            'seo_description.string' => __('rules.string'),
            'seo_description.max' => __('rules.max', ['max' => 500]),
            'additional_information.array' => __('rules.array'),
            'additional_information.*.key.string' => __('rules.string'),
            'additional_information.*.key.max' => __('rules.max', ['max' => 255]),
            'additional_information.*.value.string' => __('rules.string'),
            'additional_information.*.value.max' => __('rules.max', ['max' => 255]),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'slug' => __('attribute.slug'),
            'product_category_id' => __('admin.category'),
            'image' => __('attribute.image'),
            'qty' => __('attribute.quantity'),
            'price' => __('attribute.price'),
            'sale_price' => __('attribute.sale_price'),
            'sku' => __('attribute.sku'),
            'is_new' => __('attribute.is_new'),
            'is_popular' => __('attribute.is_popular'),
            'status' => __('attribute.status'),
            'tags' => __('attribute.tags'),
            'description' => __('attribute.description'),
            'short_description' => __('attribute.short_description'),
            'seo_title' => __('attribute.seo_title'),
            'seo_description' => __('attribute.seo_description'),
            'additional_information' => __('attribute.additional_information'),
        ];
    }
}
