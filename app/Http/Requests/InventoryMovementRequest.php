<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class InventoryMovementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_id'     => 'required|exists:products,id', // Debe existir en la tabla products
            'type'           => 'required|in:entry,exit', // Solo puede ser 'entry' o 'exit'
            'quantity'       => 'required|integer|min:1', // Cantidad mínima de 1
            'movement_date'  => 'required|date', // Debe ser una fecha válida
            'description'    => 'nullable|string|max:255', // Descripción opcional de máximo 255 caracteres
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'message' => 'The given data was invalid.',
            'errors' => $validator->errors()
        ], 422);
        throw new HttpResponseException($response);
    }
}
