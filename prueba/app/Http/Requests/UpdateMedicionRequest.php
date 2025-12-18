<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMedicionRequest extends FormRequest
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
            'afiliado_id' => ['required', 'exists:afiliados,id'],
            'peso' => ['required', 'numeric', 'min:1', 'max:300'],
            'talla' => ['required', 'numeric', 'min:0.5', 'max:2.5'],
            'observaciones' => ['nullable', 'string'],
            'fecha_medicion' => ['required', 'date'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'afiliado_id.required' => 'Debe seleccionar un afiliado.',
            'afiliado_id.exists' => 'El afiliado seleccionado no existe.',
            'peso.required' => 'El peso es obligatorio.',
            'peso.numeric' => 'El peso debe ser un número válido.',
            'peso.min' => 'El peso debe ser mayor a 1 kg.',
            'peso.max' => 'El peso no puede ser mayor a 300 kg.',
            'talla.required' => 'La talla es obligatoria.',
            'talla.numeric' => 'La talla debe ser un número válido.',
            'talla.min' => 'La talla debe ser mayor a 0.5 metros.',
            'talla.max' => 'La talla no puede ser mayor a 2.5 metros.',
            'fecha_medicion.required' => 'La fecha de medición es obligatoria.',
            'fecha_medicion.date' => 'La fecha de medición debe ser una fecha válida.',
        ];
    }
}
