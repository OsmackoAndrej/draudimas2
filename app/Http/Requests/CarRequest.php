<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class CarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'reg_number' => strtoupper($this->reg_number), // Преобразуем в верхний регистр
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'reg_number' => 'required|min:6|max:10',
            'brand' => 'required|min:3|max:25',
            'model' => 'required|min:3|max:25',
            'owner_id' => 'required|numeric|between:1,7'
        ];
    }
    public function messages(): array
    {
        return [
            'reg_number.required' => 'Поле reg_number обязательно.',
            'reg_number.min' => 'Минимальная длина reg_number — 3 символа.',
            'reg_number.max' => 'Максимальная длина reg_number — 25 символов.',
            'brand.required' => 'Поле brand обязательно.',
            'brand.min' => 'Минимальная длина brand — 3 символа.',
            'brand.max' => 'Максимальная длина brand — 25 символов.',
            'model.required' => 'Поле model обязательно.',
            'model.min' => 'Минимальная длина model — 3 символа.',
            'model.max' => 'Максимальная длина model — 25 символов.',
        ];
    }
}

