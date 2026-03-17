<?php

namespace Modules\Blog\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = [
            "blog_id" => ['required', 'exists:blogs,id'],
            "comment" => ['required', 'string', 'max:1000'],
            "parent_id" => ['nullable', 'exists:blog_comments,id'],
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

    public function messages(): array    {
        return [
            'blog_id.required' => __('rules.required'),
            'blog_id.exists' => __('rules.exists'),
            'comment.required' => __('rules.required'),
            'comment.string' => __('rules.string'),
            'comment.max' => __('rules.max', ['max' => 1000]),
            'parent_id.exists' => __('rules.exists'),
        ];
    }

    public function attributes(): array
    {
        return [
            'blog_id' => __('attribute.blog_id'),
            'comment' => __('attribute.comment'),
            'parent_id' => __('attribute.parent_id'),
        ];
    }
}
