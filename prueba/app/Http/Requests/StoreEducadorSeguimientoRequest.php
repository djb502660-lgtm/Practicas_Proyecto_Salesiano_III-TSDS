<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEducadorSeguimientoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'destinatario_id' => 'required|exists:destinatarios,id',
            'tipo' => 'required|string|in:academico,convivencial,disciplinario,otro',
            'fecha_registro' => 'required|date',
            'observacion' => 'required|string',
            'acuerdos' => 'nullable|string',
            'riesgo_detectado' => 'nullable|boolean',
            'nivel_riesgo' => 'nullable|string|in:bajo,medio,alto',
        ];
    }
}
