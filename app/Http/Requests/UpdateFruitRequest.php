<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFruitRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:fruits,name,' . $this->fruit->id,
            'category' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0.01',
            'stock_quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'availability' => 'required|boolean',
        ];
    }

    /**
     * Get custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Fruit name is required.',
            'name.unique' => 'This fruit name already exists.',
            'category.required' => 'Category is required.',
            'price_per_kg.required' => 'Price per kilogram is required.',
            'price_per_kg.numeric' => 'Price must be a valid number.',
            'stock_quantity.required' => 'Stock quantity is required.',
            'stock_quantity.integer' => 'Stock quantity must be a whole number.',
        ];
    }
}
