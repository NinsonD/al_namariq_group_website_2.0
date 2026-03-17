<?php

namespace Modules\Frontend\Http\Requests\Pages\About;

use Illuminate\Foundation\Http\FormRequest;

class AboutTeamRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'teams' => 'nullable|array',
            'teams.*' => 'nullable|exists:teams,id',
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
            'teams.array' => __('rules.array'),
            'teams.*.exists' => __('rules.exists', ['attribute' => __('attribute.teams')]),
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => __('attribute.title'),
            'teams' => __('attribute.teams'),
            'teams.*' => __('attribute.teams'),
        ];
    }
}
