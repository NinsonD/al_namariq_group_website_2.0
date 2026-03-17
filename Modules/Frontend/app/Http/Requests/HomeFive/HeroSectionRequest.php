<?php

namespace Modules\Frontend\Http\Requests\HomeFive;

use Illuminate\Foundation\Http\FormRequest;

class HeroSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {

        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'quote' => 'nullable|string|max:255',
            'quote_author' => 'nullable|string|max:255',
            'btn_url' => 'nullable|string|max:255',
            'quote_btn_text' => 'nullable|string|max:255',
            'quote_btn_url' => 'nullable|string|max:255',
            'title_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bg_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'quote_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'description' => __('attribute.description'),
            'quote' => __('attribute.quote'),
            'quote_author' => __('attribute.quote_author'),
            'btn_url' => __('attribute.btn_url'),
            'quote_btn_text' => __('attribute.quote_btn_text'),
            'quote_btn_url' => __('attribute.quote_btn_url'),
            'title_image' => __('attribute.title_image'),
            'bg_image' => __('attribute.bg_image'),
            'quote_image' => __('attribute.quote_image'),
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => __('rules.required'),
            'title.string' => __('rules.string'),
            'title.max' => __('rules.max', ['max' => 255]),

            'description.string' => __('rules.string'),
            'description.max' => __('rules.max', ['max' => 500]),

            'quote.string' => __('rules.string'),
            'quote.max' => __('rules.max', ['max' => 255]),

            'quote_author.string' => __('rules.string'),
            'quote_author.max' => __('rules.max', ['max' => 255]),

            'btn_url.string' => __('rules.string'),
            'btn_url.max' => __('rules.max', ['max' => 255]),

            'quote_btn_text.string' => __('rules.string'),
            'quote_btn_text.max' => __('rules.max', ['max' => 255]),

            'quote_btn_url.string' => __('rules.string'),
            'quote_btn_url.max' => __('rules.max', ['max' => 255]),

            'title_image.image' => __('rules.image'),
            'title_image.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'title_image.max' => __('rules.file_max', ['max' => 2048]),

            'bg_image.image' => __('rules.image'),
            'bg_image.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'bg_image.max' => __('rules.file_max', ['max' => 2048]),

            'quote_image.image' => __('rules.image'),
            'quote_image.mimes' => __('rules.mimes', ['values' => 'jpeg, png, jpg']),
            'quote_image.max' => __('rules.file_max', ['max' => 2048]),

        ];
    }
}
