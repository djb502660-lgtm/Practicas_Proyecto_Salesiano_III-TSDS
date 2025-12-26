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
            'primer_nombre' => ['required', 'string', 'max:255'],
            'segundo_nombre' => ['required', 'string', 'max:255'],
            'primer_apellido' => ['required', 'string', 'max:255'],
            'segundo_apellido' => ['required', 'string', 'max:255'],
            'fecha_nacimiento' => ['required', 'date', 'before:today'],
            'edad' => ['required', 'integer', 'min:0'],
            'genero' => ['required', 'in:masculino,femenino,otro'],
            'estado_civil' => ['nullable', 'in:soltero,casado,divorciado,viudo,union_libre'],
            'nacionalidad' => ['required', 'string', 'max:255'],
            'tipo_documento' => ['required', 'in:cedula,pasaporte,tarjeta_identidad,cedula_extranjeria'],
            'numero_documento' => ['required', 'string', 'max:255', 'unique:afiliados'],
            'lugar_nacimiento' => ['required', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'celular' => ['nullable', 'string', 'max:20'],
            'email' => ['nullable', 'email', 'max:255'],
            'direccion_residencia' => ['nullable', 'string'],
            'direccion_domicilio' => ['required', 'string'],
            'barrio' => ['nullable', 'string', 'max:255'],
            'sector_barrio' => ['required', 'string', 'max:255'],
            'ciudad' => ['nullable', 'string', 'max:255'],
            'ciudad_residencia' => ['required', 'string', 'max:255'],
            'parroquia_civil' => ['required', 'string', 'max:255'],
            'departamento' => ['nullable', 'string', 'max:255'],
            'departamento_referencia' => ['required', 'string', 'max:255'],
            'pais' => ['nullable', 'string', 'max:255'],
            'codigo_postal' => ['nullable', 'string', 'max:10'],
            'contacto_telefonico' => ['required', 'string', 'max:20'],
            'tiene_discapacidad' => ['required', 'boolean'],
            'porcentaje_discapacidad' => ['required_if:tiene_discapacidad,1', 'nullable', 'integer', 'min:0', 'max:100'],
            'nombre_conyuge' => ['nullable', 'string', 'max:255'],
            'numero_hijos' => ['nullable', 'integer', 'min:0'],
            'personas_a_cargo' => ['nullable', 'integer', 'min:0'],
            'informacion_familiar' => ['nullable', 'string'],
            'nombre_representante' => ['required', 'string', 'max:255'],
            'apellido_representante' => ['required', 'string', 'max:255'],
            'tipo_documento_representante' => ['required', 'in:cedula,pasaporte,tarjeta_identidad,cedula_extranjeria'],
            'numero_documento_representante' => ['required', 'string', 'max:255'],
            'parentesco' => ['required', 'string', 'max:255'],
            'edad_representante' => ['required', 'integer', 'min:0'],
            'nivel_estudio' => ['required', 'string', 'max:255'],
            'ocupacion' => ['required', 'string', 'max:255'],
            'lugar_trabajo' => ['required', 'string', 'max:255'],
            'cargo' => ['nullable', 'string', 'max:255'],
            'ingresos_mensuales' => ['required', 'numeric', 'min:0'],
            'tipo_empleo' => ['required', 'in:permanente,ocasional'],
            'jornada_laboral' => ['required', 'string', 'max:255'],
            'dias_laborales' => ['required', 'string', 'max:255'],
            'horario_trabajo' => ['required', 'string', 'max:255'],
            'descripcion_laboral' => ['nullable', 'string'],
            'estudia' => ['required', 'boolean'],
            'nivel_educativo' => ['required_if:estudia,1', 'nullable', 'in:inicial,basica,bachillerato'],
            'institucion_educativa' => ['required_if:estudia,1', 'nullable', 'string', 'max:255'],
            'ultimo_anio_aprobado' => ['required_if:estudia,1', 'nullable', 'string', 'max:255'],
            'jornada' => ['required_if:estudia,1', 'nullable', 'in:matutina,vespertina,nocturna'],
            'representante_legal' => ['required_if:estudia,1', 'nullable', 'string', 'max:255'],
            'tiene_seguro_salud' => ['nullable', 'boolean'],
            'tipo_seguro_salud' => ['required_if:tiene_seguro_salud,1', 'nullable', 'in:iess,seguro_campesino,issfa,isspol,privado,ninguno'],
            'eps' => ['nullable', 'string', 'max:255'],
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
            'segundo_nombre.required' => 'El segundo nombre es obligatorio.',
            'primer_apellido.required' => 'El primer apellido es obligatorio.',
            'segundo_apellido.required' => 'El segundo apellido es obligatorio.',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.before' => 'La fecha de nacimiento debe ser anterior a hoy.',
            'numero_documento.required' => 'El numero de documento es obligatorio.',
            'numero_documento.unique' => 'Este numero de documento ya esta registrado.',
            'direccion_domicilio.required' => 'La direccion de domicilio es obligatoria.',
            'ciudad_residencia.required' => 'La ciudad de residencia es obligatoria.',
            'parroquia_civil.required' => 'La parroquia civil es obligatoria.',
            'sector_barrio.required' => 'El sector o barrio es obligatorio.',
            'departamento_referencia.required' => 'La referencia del departamento es obligatoria.',
            'contacto_telefonico.required' => 'El contacto telefonico es obligatorio.',
            'tiene_discapacidad.required' => 'Debe indicar si tiene discapacidad.',
            'porcentaje_discapacidad.required_if' => 'El porcentaje de discapacidad es obligatorio.',
            'nombre_representante.required' => 'El nombre del representante es obligatorio.',
            'apellido_representante.required' => 'El apellido del representante es obligatorio.',
            'tipo_documento_representante.required' => 'El tipo de documento del representante es obligatorio.',
            'numero_documento_representante.required' => 'El numero de documento del representante es obligatorio.',
            'parentesco.required' => 'El parentesco es obligatorio.',
            'edad_representante.required' => 'La edad del representante es obligatoria.',
            'nivel_estudio.required' => 'El nivel de estudio del representante es obligatorio.',
            'ocupacion.required' => 'La ocupacion del representante es obligatoria.',
            'lugar_trabajo.required' => 'El lugar de trabajo del representante es obligatorio.',
            'tipo_empleo.required' => 'El tipo de empleo del representante es obligatorio.',
            'jornada_laboral.required' => 'La jornada laboral es obligatoria.',
            'dias_laborales.required' => 'Los dias laborales son obligatorios.',
            'horario_trabajo.required' => 'El horario de trabajo es obligatorio.',
            'ingresos_mensuales.required' => 'Los ingresos mensuales son obligatorios.',
            'estudia.required' => 'Debe indicar si estudia.',
            'nivel_educativo.required_if' => 'El nivel educativo es obligatorio.',
            'institucion_educativa.required_if' => 'La institucion educativa es obligatoria.',
            'ultimo_anio_aprobado.required_if' => 'El ultimo anio aprobado es obligatorio.',
            'jornada.required_if' => 'La jornada escolar es obligatoria.',
            'representante_legal.required_if' => 'El representante legal es obligatorio.',
        ];
    }
}
