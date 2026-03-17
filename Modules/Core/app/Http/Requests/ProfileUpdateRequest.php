<?php

namespace Modules\Core\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'phone' => ['required', 'string', Rule::unique(User::class)->ignore($this->user()->id)],
            'designation' => ['required', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'zip_code' => ['nullable', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('rules.required'),
            'name.string' => __('rules.string'),
            'name.max' => __('rules.max', ['max' => 255]),
            'email.max' => __('rules.required'),
            'email.string' => __('rules.string'),
            'email.email' => __('rules.email'),
            'email.unique' => __('rules.unique'),
            'phone.required' => __('rules.required'),
            'phone.string' => __('rules.string'),
            'phone.unique' => __('rules.unique'),
            'designation.required' => __('rules.required'),
            'designation.string' => __('rules.string'),
            'designation.max' => __('rules.max', ['max' => 255]),
            'address.string' => __('rules.string'),
            'address.max' => __('rules.max', ['max' => 255]),
            'zip_code.string' => __('rules.string'),
            'zip_code.max' => __('rules.max', ['max' => 255]),
            'bio.string' => __('rules.string'),
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('attribute.name'),
            'email' => __('attribute.email'),
            'phone' => __('attribute.phone'),
            'designation' => __('attribute.designation'),
            'address' => __('attribute.address'),
            'zip_code' => __('attribute.zip_code'),
            'bio' => __('attribute.bio'),
        ];
    }
}
