<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePsicologiaRequest extends FormRequest
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
            'destinatario_id' => ['required', 'exists:destinatarios,id'],
            'tipo' => ['required', 'in:evaluacion,seguimiento'],
            'fecha_registro' => ['required', 'date'],
            'estado_emocional' => ['nullable', 'string'],
            'conducta' => ['nullable', 'string'],
            'diagnostico_inicial' => ['required_if:tipo,evaluacion', 'nullable', 'string'],
            'evolucion' => ['required_if:tipo,seguimiento', 'nullable', 'string'],
            'observaciones' => ['nullable', 'string'],
            'riesgo_detectado' => ['nullable', 'boolean'],
            'nivel_riesgo' => ['required', 'in:bajo,medio,alto'],
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
            'destinatario_id.required' => 'Debe seleccionar un destinatario.',
            'destinatario_id.exists' => 'El destinatario seleccionado no existe.',
            'tipo.required' => 'El tipo de registro es obligatorio.',
            'tipo.in' => 'El tipo de registro no es valido.',
            'fecha_registro.required' => 'La fecha es obligatoria.',
            'fecha_registro.date' => 'La fecha debe ser una fecha valida.',
            'diagnostico_inicial.required_if' => 'El diagnostico inicial es obligatorio para una evaluacion.',
            'evolucion.required_if' => 'La evolucion es obligatoria para un seguimiento.',
            'nivel_riesgo.required' => 'El nivel de riesgo es obligatorio.',
            'nivel_riesgo.in' => 'El nivel de riesgo no es valido.',
        ];
    }
}
