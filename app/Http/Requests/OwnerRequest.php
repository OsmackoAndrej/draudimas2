<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:25',
            'surname' => 'required|string|min:3|max:25',
            'email' => 'required|email|unique:owners,email',
            'phone' => 'required|numeric',
            'address' => 'required|string|min:3|max:25',
        ];
    }

    public function messages(): array
    {
        return [
            'reg_number.required' => 'Поле reg_number обязательно.',
            'reg_number.min' => 'Минимальная длина reg_number — 3 символа.',
            'reg_number.max' => 'Максимальная длина reg_number — 25 символов.',
            'model.required' => 'Поле model обязательно.',
            'model.min' => 'Минимальная длина model — 3 символа.',
            'model.max' => 'Максимальная длина model — 25 символов.',
        ];
    }
}
