<?php

namespace Modules\Testimonial\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'comment' => ['required', 'string'],
            'score' => ['required', 'integer', 'min:1', 'max:5'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];

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
            'designation.required' => __('rules.required'),
            'designation.string' => __('rules.string'),
            'designation.max' => __('rules.max', ['max'=> 255]),
            'comment.required' => __('rules.required'),
            'comment.string' => __('rules.string'),
            'score.required' => __('rules.required'),
            'score.integer' => __('rules.integer'),
            'score.min' => __('rules.min', ['min' => 1]),
            'score.max' => __('rules.max', ['max' => 5]),
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('attribute.name'),
            'designation' => __('attribute.designation'),
            'comment' => __('attribute.comment'),
            'score' => __('attribute.score'),
            'image' => __('attribute.image'),
        ];
    }
}
