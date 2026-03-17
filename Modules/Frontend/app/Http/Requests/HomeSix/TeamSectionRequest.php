<?php

namespace Modules\Frontend\Http\Requests\HomeSix;

use Illuminate\Foundation\Http\FormRequest;

class TeamSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
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

    public function attributes(): array
    {
        return [
            'teams' => __('attribute.teams'),
            'teams.*' => __('attribute.teams'),
        ];
    }

    public function messages(): array
    {
        return [
            'teams.array' => __('rules.array'),
            'teams.*.exists' => __('rules.exists'),
        ];
    }
}
