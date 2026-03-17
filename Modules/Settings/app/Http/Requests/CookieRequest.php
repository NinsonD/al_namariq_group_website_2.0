<?php

namespace Modules\Settings\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CookieRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'cookie_border' => ['required', 'string', 'in:none,thin,normal,thick'],
            'cookie_corners' => ['required', 'string', 'in:none,small,normal,large'],
            'cookie_background_color' => ['required', 'string', 'max:255'],
            'cookie_text_color' => ['required', 'string', 'max:255'],
            'cookie_border_color' => ['required', 'string', 'max:255'],
            'cookie_btn_bg_color' => ['required', 'string', 'max:255'],
            'cookie_btn_text_color' => ['required', 'string', 'max:255'],
            'cookie_link_text' => ['required', 'string', 'max:255'],
            'cookie_link' => ['required', 'string', 'max:255'],
            'cookie_btn_text' => ['required', 'string', 'max:255'],
            'cookie_message' => ['required', 'string'],
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
            'cookie_border.required' => __('rules.required'),
            'cookie_border.string' => __('rules.string'),
            'cookie_border.in' => __('rules.exists'),
            'cookie_corners.required' => __('rules.required'),
            'cookie_corners.string' => __('rules.string'),
            'cookie_corners.in' => __('rules.exists'),
            'cookie_background_color.required' => __('rules.required'),
            'cookie_background_color.string' => __('rules.string'),
            'cookie_background_color.max' => __('rules.max', ['max'=> 255]),
            'cookie_text_color.required' => __('rules.required'),
            'cookie_text_color.string' => __('rules.string'),
            'cookie_text_color.max' => __('rules.max', ['max'=> 255]),
            'cookie_border_color.required' => __('rules.required'),
            'cookie_border_color.string' => __('rules.string'),
            'cookie_border_color.max' => __('rules.max', ['max'=> 255]),
            'cookie_btn_bg_color.required' => __('rules.required'),
            'cookie_btn_bg_color.string' => __('rules.string'),
            'cookie_btn_bg_color.max' => __('rules.max', ['max'=> 255]),
            'cookie_btn_text_color.required' => __('rules.required'),
            'cookie_btn_text_color.string' => __('rules.string'),
            'cookie_btn_text_color.max' => __('rules.max', ['max'=> 255]),
            'cookie_link_text.required' => __('rules.required'),
            'cookie_link_text.string' => __('rules.string'),
            'cookie_link_text.max' => __('rules.max', ['max'=> 255]),
            'cookie_link.required' => __('rules.required'),
            'cookie_link.string' => __('rules.string'),
            'cookie_link.max' => __('rules.max', ['max'=> 255]),
            'cookie_btn_text.required' => __('rules.required'),
            'cookie_btn_text.string' => __('rules.string'),
            'cookie_btn_text.max' => __('rules.max', ['max'=> 255]),
            'cookie_message.required' => __('rules.required'),
            'cookie_message.string' => __('rules.string'),
        ];
    }

    public function attributes(): array
    {
        return [
            'cookie_border' => __('attribute.cookie_border'),
            'cookie_corners' => __('attribute.cookie_corners'),
            'cookie_background_color' => __('attribute.cookie_background_color'),
            'cookie_text_color' => __('attribute.cookie_text_color'),
            'cookie_border_color' => __('attribute.cookie_border_color'),
            'cookie_btn_bg_color' => __('attribute.cookie_btn_bg_color'),
            'cookie_btn_text_color' => __('attribute.cookie_btn_text_color'),
            'cookie_link_text' => __('attribute.cookie_link_text'),
            'cookie_link' => __('attribute.cookie_link'),
            'cookie_btn_text' => __('attribute.cookie_btn_text'),
            'cookie_message' => __('attribute.cookie_message'),
        ];
    }
}
