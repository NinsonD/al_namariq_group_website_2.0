<?php

namespace Modules\Language\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Language\Enums\CountriesDataEnum;

class LanguageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $validCodes = CountriesDataEnum::loadLanguages()->pluck('code')->implode(',');

        $rules = [];

        if ($this->isMethod('put')) {
            $rules['name'] = 'required|string|max:255|unique:languages,name,' . $this->language->id;
            $rules['code'] = [
                'required',
                'string',
                'max:4',
                'in:' . $validCodes,
                Rule::unique('languages', 'code')->ignore($this->language->id),
            ];
        }

        if ($this->isMethod('post')) {
            $rules = [
                'name' => 'required|string|max:255|unique:languages,name',
                'code' => [
                    'required',
                    'string',
                    'max:4',
                    'in:' . $validCodes,
                    'unique:languages,code',
                ],
            ];
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
            'name.required' => __('validation.required'),
            'name.string' => __('validation.string'),
            'name.max' => __('validation.max.string'),
            'name.unique' => __('validation.unique'),

            'code.required' => __('validation.required'),
            'code.string' => __('validation.string'),
            'code.max' => __('validation.max.string'),
            'code.unique' => __('validation.unique'),
        ];
    }

    /**
     * Get custom attributes for validator errors.
     */
    public function attributes(): array
    {
        return [
            'name' => __('attribute.name'),
            'code' => __('attribute.code'),
        ];
    }
}
