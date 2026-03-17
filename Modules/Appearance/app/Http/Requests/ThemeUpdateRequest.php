<?php

namespace Modules\Appearance\Http\Requests;

use App\Enums\ThemeList;
use Illuminate\Foundation\Http\FormRequest;

class ThemeUpdateRequest extends FormRequest
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
        return [
            'theme' =>  ['required', 'string', 'in:' . implode(',', array_column(ThemeList::cases(), 'value'))],
        ];
    }

    public function messages(): array
    {
        return [
            'theme.required' => __('rules.required'),
            'theme.string' => __('rules.string'),
            'theme.in' => __('rules.exists'),
        ];
    }
    
    public function attributes(): array
    {
        return [
            'theme' => __('attribute.theme'),
        ];
    }
}
