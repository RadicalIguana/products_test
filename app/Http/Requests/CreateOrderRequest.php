<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            'customer_name' => 'required|string|max:255',
            'product_id'    => 'required|exists:products,id',
            'quantity'      => 'required|integer|min:1',
            'comment'       => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'customer_name.required' => 'Введите ФИО покупателя',
            'product_id.required'    => 'Выберите товар',
            'product_id.exists'      => 'Указанный товар не существует',
            'quantity.min'           => 'Количество должно быть минимум 1',
        ];
    }
}
