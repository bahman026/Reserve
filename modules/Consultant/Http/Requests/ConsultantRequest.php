<?php

declare(strict_types=1);

namespace Modules\Consultant\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultantRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:consultants,email',
        ];
    }

    public function messages(): array
    {
        return [
            'full_name.required' => trans('validation.custom.full_name.required'),
            'full_name.string' => trans('validation.custom.full_name.string'),
            'full_name.max' => trans('validation.custom.full_name.max'),

            'email.required' => trans('validation.custom.email.required'),
            'email.email' => trans('validation.custom.email.email'),
            'email.unique' => trans('validation.custom.email.unique'),
        ];
    }
}
