<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAfiliadoRequest extends FormRequest
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
            'foto' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'primer_nombre' => ['required', 'string', 'max:255'],
            'segundo_nombre' => ['nullable', 'string', 'max:255'],
            'primer_apellido' => ['required', 'string', 'max:255'],
            'segundo_apellido' => ['nullable', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date', 'before:today'],
            'genero' => ['required', 'in:masculino,femenino,otro'],
            'estado_civil' => ['required', 'in:soltero,casado,divorciado,viudo,union_libre'],
            'nacionalidad' => ['required', 'string', 'max:255'],
            'tipo_documento' => ['required', 'in:cedula,pasaporte,tarjeta_identidad,cedula_extranjeria'],
            'numero_documento' => ['required', 'string', 'max:255', 'unique:afiliados'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'celular' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'direccion_residencia' => ['required', 'string'],
            'barrio' => ['nullable', 'string', 'max:255'],
            'ciudad' => ['required', 'string', 'max:255'],
            'departamento' => ['required', 'string', 'max:255'],
            'pais' => ['required', 'string', 'max:255'],
            'codigo_postal' => ['nullable', 'string', 'max:10'],
            'nombre_conyuge' => ['nullable', 'string', 'max:255'],
            'numero_hijos' => ['nullable', 'integer', 'min:0'],
            'personas_a_cargo' => ['nullable', 'integer', 'min:0'],
            'informacion_familiar' => ['nullable', 'string'],
            'ocupacion' => ['nullable', 'string', 'max:255'],
            'lugar_trabajo' => ['nullable', 'string', 'max:255'],
            'ingresos_mensuales' => ['nullable', 'numeric', 'min:0'],
            'tipo_empleo' => ['nullable', 'in:empleado,independiente,desempleado,estudiante,jubilado,otro'],
            'descripcion_laboral' => ['nullable', 'string'],
            'nivel_educativo' => ['nullable', 'in:primaria,secundaria,tecnico,universitario,ninguno'],
            'institucion_educativa' => ['nullable', 'string', 'max:255'],
            'titulo_obtenido' => ['nullable', 'string', 'max:255'],
            'estudiando_actualmente' => ['nullable', 'boolean'],
            'tiene_seguro_salud' => ['nullable', 'boolean'],
            'tipo_seguro_salud' => ['nullable', 'in:Sisbén,Privado,Especial'],
            'condiciones_medicas' => ['nullable', 'string'],
            'medicamentos_permanentes' => ['nullable', 'string'],
            'alergias' => ['nullable', 'string'],
            'observaciones' => ['nullable', 'string'],
            'estado' => ['required', 'in:activo,inactivo,suspendido'],
            'fecha_registro' => ['required', 'date'],
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
            'primer_nombre.required' => 'El primer nombre es obligatorio.',
            'primer_apellido.required' => 'El primer apellido es obligatorio.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
            'numero_documento.required' => 'El número de documento es obligatorio.',
            'numero_documento.unique' => 'Este número de documento ya está registrado.',
            'direccion_residencia.required' => 'La dirección de residencia es obligatoria.',
            'ciudad.required' => 'La ciudad es obligatoria.',
            'departamento.required' => 'El departamento es obligatorio.',
            'celular.required' => 'El número de celular es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'genero.required' => 'El género es obligatorio.',
            'estado_civil.required' => 'El estado civil es obligatorio.',
            'tipo_documento.required' => 'El tipo de documento es obligatorio.',
            'nacionalidad.required' => 'La nacionalidad es obligatoria.',
        ];
    }
}

