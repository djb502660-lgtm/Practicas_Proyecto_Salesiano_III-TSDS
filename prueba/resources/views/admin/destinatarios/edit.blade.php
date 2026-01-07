@extends('layaout.app')

@section('title', 'Editar Destinatario')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                    <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                        <h4 class="mb-0" style="color: #000000;">Editar Destinatario: {{ $destinatario->nombre_completo }}
                        </h4>
                    </div>
                    <div class="card-body" style="background-color: #ffffff;">
                        <form action="{{ route('admin.destinatarios.update', $destinatario) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Datos Personales -->
                            <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                                <div class="card-header"
                                    style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                    <h5 style="color: #000000; margin: 0;"><i class="bx bx-user"
                                            style="color: #dc3545;"></i> Datos Personales</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="primer_nombre" class="form-label" style="color: #000000;">Primer
                                                Nombre <span style="color: #dc3545;">*</span></label>
                                            <input type="text"
                                                class="form-control @error('primer_nombre') is-invalid @enderror"
                                                id="primer_nombre" name="primer_nombre"
                                                value="{{ old('primer_nombre', $destinatario->primer_nombre) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                            @error('primer_nombre')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="segundo_nombre" class="form-label" style="color: #000000;">Segundo
                                                Nombre</label>
                                            <input type="text" class="form-control" id="segundo_nombre"
                                                name="segundo_nombre"
                                                value="{{ old('segundo_nombre', $destinatario->segundo_nombre) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="primer_apellido" class="form-label" style="color: #000000;">Primer
                                                Apellido <span style="color: #dc3545;">*</span></label>
                                            <input type="text"
                                                class="form-control @error('primer_apellido') is-invalid @enderror"
                                                id="primer_apellido" name="primer_apellido"
                                                value="{{ old('primer_apellido', $destinatario->primer_apellido) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                            @error('primer_apellido')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="segundo_apellido" class="form-label" style="color: #000000;">Segundo
                                                Apellido</label>
                                            <input type="text" class="form-control" id="segundo_apellido"
                                                name="segundo_apellido"
                                                value="{{ old('segundo_apellido', $destinatario->segundo_apellido) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="fecha_nacimiento" class="form-label" style="color: #000000;">Fecha
                                                de Nacimiento <span style="color: #dc3545;">*</span></label>
                                            <input type="date"
                                                class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                                                id="fecha_nacimiento" name="fecha_nacimiento"
                                                value="{{ old('fecha_nacimiento', $destinatario->fecha_nacimiento->format('Y-m-d')) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                            @error('fecha_nacimiento')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="genero" class="form-label" style="color: #000000;">Género <span
                                                    style="color: #dc3545;">*</span></label>
                                            <select class="form-control @error('genero') is-invalid @enderror" id="genero"
                                                name="genero" style="border: 1px solid #808080; color: #000000;">
                                                <option value="masculino" {{ old('genero', $destinatario->genero) == 'masculino' ? 'selected' : '' }}>Masculino
                                                </option>
                                                <option value="femenino" {{ old('genero', $destinatario->genero) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                                <option value="otro" {{ old('genero', $destinatario->genero) == 'otro' ? 'selected' : '' }}>Otro</option>
                                            </select>
                                            @error('genero')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="estado_civil" class="form-label" style="color: #000000;">Estado
                                                Civil <span style="color: #dc3545;">*</span></label>
                                            <select class="form-control @error('estado_civil') is-invalid @enderror"
                                                id="estado_civil" name="estado_civil"
                                                style="border: 1px solid #808080; color: #000000;">
                                                <option value="soltero" {{ old('estado_civil', $destinatario->estado_civil) == 'soltero' ? 'selected' : '' }}>Soltero
                                                </option>
                                                <option value="casado" {{ old('estado_civil', $destinatario->estado_civil) == 'casado' ? 'selected' : '' }}>Casado
                                                </option>
                                                <option value="divorciado" {{ old('estado_civil', $destinatario->estado_civil) == 'divorciado' ? 'selected' : '' }}>
                                                    Divorciado</option>
                                                <option value="viudo" {{ old('estado_civil', $destinatario->estado_civil) == 'viudo' ? 'selected' : '' }}>Viudo
                                                </option>
                                                <option value="union_libre" {{ old('estado_civil', $destinatario->estado_civil) == 'union_libre' ? 'selected' : '' }}>Unión
                                                    Libre</option>
                                            </select>
                                            @error('estado_civil')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="tipo_documento" class="form-label" style="color: #000000;">Tipo de
                                                Documento <span style="color: #dc3545;">*</span></label>
                                            <select class="form-control @error('tipo_documento') is-invalid @enderror"
                                                id="tipo_documento" name="tipo_documento"
                                                style="border: 1px solid #808080; color: #000000;">
                                                <option value="cedula" {{ old('tipo_documento', $destinatario->tipo_documento) == 'cedula' ? 'selected' : '' }}>Cédula
                                                </option>
                                                <option value="pasaporte" {{ old('tipo_documento', $destinatario->tipo_documento) == 'pasaporte' ? 'selected' : '' }}>
                                                    Pasaporte</option>
                                                <option value="tarjeta_identidad" {{ old('tipo_documento', $destinatario->tipo_documento) == 'tarjeta_identidad' ? 'selected' : '' }}>Tarjeta de Identidad</option>
                                                <option value="cedula_extranjeria" {{ old('tipo_documento', $destinatario->tipo_documento) == 'cedula_extranjeria' ? 'selected' : '' }}>Cédula de Extranjería</option>
                                            </select>
                                            @error('tipo_documento')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="numero_documento" class="form-label" style="color: #000000;">Número
                                                de Documento <span style="color: #dc3545;">*</span></label>
                                            <input type="text"
                                                class="form-control @error('numero_documento') is-invalid @enderror"
                                                id="numero_documento" name="numero_documento"
                                                value="{{ old('numero_documento', $destinatario->numero_documento) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                            @error('numero_documento')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="nacionalidad" class="form-label"
                                                style="color: #000000;">Nacionalidad <span
                                                    style="color: #dc3545;">*</span></label>
                                            <input type="text"
                                                class="form-control @error('nacionalidad') is-invalid @enderror"
                                                id="nacionalidad" name="nacionalidad"
                                                value="{{ old('nacionalidad', $destinatario->nacionalidad) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                            @error('nacionalidad')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Datos de Contacto -->
                            <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                                <div class="card-header"
                                    style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                    <h5 style="color: #000000; margin: 0;"><i class="bx bx-phone"
                                            style="color: #dc3545;"></i> Datos de Contacto</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="telefono" class="form-label"
                                                style="color: #000000;">Teléfono</label>
                                            <input type="text" class="form-control" id="telefono" name="telefono"
                                                value="{{ old('telefono', $destinatario->telefono) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="celular" class="form-label" style="color: #000000;">Celular</label>
                                            <input type="text" class="form-control" id="celular" name="celular"
                                                value="{{ old('celular', $destinatario->celular) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="email" class="form-label" style="color: #000000;">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                value="{{ old('email', $destinatario->email) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="direccion_residencia" class="form-label"
                                                style="color: #000000;">Dirección de Residencia <span
                                                    style="color: #dc3545;">*</span></label>
                                            <textarea
                                                class="form-control @error('direccion_residencia') is-invalid @enderror"
                                                id="direccion_residencia" name="direccion_residencia" rows="2"
                                                style="border: 1px solid #808080; color: #000000;">{{ old('direccion_residencia', $destinatario->direccion_residencia) }}</textarea>
                                            @error('direccion_residencia')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3 mb-3">
                                            <label for="barrio" class="form-label" style="color: #000000;">Barrio</label>
                                            <input type="text" class="form-control" id="barrio" name="barrio"
                                                value="{{ old('barrio', $destinatario->barrio) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="ciudad" class="form-label" style="color: #000000;">Ciudad <span
                                                    style="color: #dc3545;">*</span></label>
                                            <input type="text" class="form-control @error('ciudad') is-invalid @enderror"
                                                id="ciudad" name="ciudad" value="{{ old('ciudad', $destinatario->ciudad) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                            @error('ciudad')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="departamento" class="form-label"
                                                style="color: #000000;">Departamento <span
                                                    style="color: #dc3545;">*</span></label>
                                            <input type="text"
                                                class="form-control @error('departamento') is-invalid @enderror"
                                                id="departamento" name="departamento"
                                                value="{{ old('departamento', $destinatario->departamento) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                            @error('departamento')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="pais" class="form-label" style="color: #000000;">País <span
                                                    style="color: #dc3545;">*</span></label>
                                            <input type="text" class="form-control" id="pais" name="pais"
                                                value="{{ old('pais', $destinatario->pais) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Datos Familiares -->
                            <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                                <div class="card-header"
                                    style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                    <h5 style="color: #000000; margin: 0;"><i class="bx bx-group"
                                            style="color: #dc3545;"></i> Datos Familiares</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="nombre_conyuge" class="form-label" style="color: #000000;">Nombre
                                                del Cónyuge</label>
                                            <input type="text" class="form-control" id="nombre_conyuge"
                                                name="nombre_conyuge"
                                                value="{{ old('nombre_conyuge', $destinatario->nombre_conyuge) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="numero_hijos" class="form-label" style="color: #000000;">Número de
                                                Hijos</label>
                                            <input type="number" class="form-control" id="numero_hijos" name="numero_hijos"
                                                value="{{ old('numero_hijos', $destinatario->numero_hijos) }}" min="0"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="personas_a_cargo" class="form-label"
                                                style="color: #000000;">Personas a Cargo</label>
                                            <input type="number" class="form-control" id="personas_a_cargo"
                                                name="personas_a_cargo"
                                                value="{{ old('personas_a_cargo', $destinatario->personas_a_cargo) }}"
                                                min="0" style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="informacion_familiar" class="form-label"
                                                style="color: #000000;">Información Familiar Adicional</label>
                                            <textarea class="form-control" id="informacion_familiar"
                                                name="informacion_familiar" rows="3"
                                                style="border: 1px solid #808080; color: #000000;">{{ old('informacion_familiar', $destinatario->informacion_familiar) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Datos Laborales -->
                            <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                                <div class="card-header"
                                    style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                    <h5 style="color: #000000; margin: 0;"><i class="bx bx-briefcase"
                                            style="color: #dc3545;"></i> Datos Laborales</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="ocupacion" class="form-label"
                                                style="color: #000000;">Ocupación</label>
                                            <input type="text" class="form-control" id="ocupacion" name="ocupacion"
                                                value="{{ old('ocupacion', $destinatario->ocupacion) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="lugar_trabajo" class="form-label" style="color: #000000;">Lugar de
                                                Trabajo</label>
                                            <input type="text" class="form-control" id="lugar_trabajo" name="lugar_trabajo"
                                                value="{{ old('lugar_trabajo', $destinatario->lugar_trabajo) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="cargo" class="form-label" style="color: #000000;">Cargo</label>
                                            <input type="text" class="form-control" id="cargo" name="cargo"
                                                value="{{ old('cargo', $destinatario->cargo) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="tipo_empleo" class="form-label" style="color: #000000;">Tipo de
                                                Empleo</label>
                                            <select class="form-control" id="tipo_empleo" name="tipo_empleo"
                                                style="border: 1px solid #808080; color: #000000;">
                                                <option value="">Seleccione...</option>
                                                <option value="empleado" {{ old('tipo_empleo', $destinatario->tipo_empleo) == 'empleado' ? 'selected' : '' }}>Empleado
                                                </option>
                                                <option value="independiente" {{ old('tipo_empleo', $destinatario->tipo_empleo) == 'independiente' ? 'selected' : '' }}>
                                                    Independiente</option>
                                                <option value="desempleado" {{ old('tipo_empleo', $destinatario->tipo_empleo) == 'desempleado' ? 'selected' : '' }}>
                                                    Desempleado</option>
                                                <option value="estudiante" {{ old('tipo_empleo', $destinatario->tipo_empleo) == 'estudiante' ? 'selected' : '' }}>
                                                    Estudiante</option>
                                                <option value="jubilado" {{ old('tipo_empleo', $destinatario->tipo_empleo) == 'jubilado' ? 'selected' : '' }}>Jubilado
                                                </option>
                                                <option value="otro" {{ old('tipo_empleo', $destinatario->tipo_empleo) == 'otro' ? 'selected' : '' }}>Otro</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="ingresos_mensuales" class="form-label"
                                                style="color: #000000;">Ingresos Mensuales</label>
                                            <input type="number" step="0.01" class="form-control" id="ingresos_mensuales"
                                                name="ingresos_mensuales"
                                                value="{{ old('ingresos_mensuales', $destinatario->ingresos_mensuales) }}"
                                                min="0" style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="fecha_registro" class="form-label" style="color: #000000;">Fecha de
                                                Registro <span style="color: #dc3545;">*</span></label>
                                            <input type="date"
                                                class="form-control @error('fecha_registro') is-invalid @enderror"
                                                id="fecha_registro" name="fecha_registro"
                                                value="{{ old('fecha_registro', $destinatario->fecha_registro->format('Y-m-d')) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                            @error('fecha_registro')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label for="descripcion_laboral" class="form-label"
                                                style="color: #000000;">Descripción Laboral</label>
                                            <textarea class="form-control" id="descripcion_laboral"
                                                name="descripcion_laboral" rows="2"
                                                style="border: 1px solid #808080; color: #000000;">{{ old('descripcion_laboral', $destinatario->descripcion_laboral) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Datos Educativos -->
                            <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                                <div class="card-header"
                                    style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                    <h5 style="color: #000000; margin: 0;"><i class="bx bx-book"
                                            style="color: #dc3545;"></i> Datos Educativos</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="nivel_educativo" class="form-label" style="color: #000000;">Nivel
                                                Educativo</label>
                                            <select class="form-control" id="nivel_educativo" name="nivel_educativo"
                                                style="border: 1px solid #808080; color: #000000;">
                                                <option value="">Seleccione...</option>
                                                <option value="primaria" {{ old('nivel_educativo', $destinatario->nivel_educativo) == 'primaria' ? 'selected' : '' }}>
                                                    Primaria</option>
                                                <option value="secundaria" {{ old('nivel_educativo', $destinatario->nivel_educativo) == 'secundaria' ? 'selected' : '' }}>
                                                    Secundaria</option>
                                                <option value="tecnico" {{ old('nivel_educativo', $destinatario->nivel_educativo) == 'tecnico' ? 'selected' : '' }}>Técnico
                                                </option>
                                                <option value="universitario" {{ old('nivel_educativo', $destinatario->nivel_educativo) == 'universitario' ? 'selected' : '' }}>
                                                    Universitario</option>
                                                <option value="postgrado" {{ old('nivel_educativo', $destinatario->nivel_educativo) == 'postgrado' ? 'selected' : '' }}>
                                                    Postgrado</option>
                                                <option value="ninguno" {{ old('nivel_educativo', $destinatario->nivel_educativo) == 'ninguno' ? 'selected' : '' }}>Ninguno
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="institucion_educativa_id" class="form-label"
                                                style="color: #000000;">Institución Educativa</label>
                                            <select class="form-control @error('institucion_educativa_id') is-invalid @enderror"
                                                id="institucion_educativa_id" name="institucion_educativa_id"
                                                style="border: 1px solid #808080; color: #000000;">
                                                <option value="">Seleccione...</option>
                                                @foreach($instituciones as $institucion)
                                                    <option value="{{ $institucion->id }}" {{ old('institucion_educativa_id', $destinatario->institucion_educativa_id) == $institucion->id ? 'selected' : '' }}>
                                                        {{ $institucion->nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('institucion_educativa_id')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="titulo_obtenido" class="form-label" style="color: #000000;">Título
                                                Obtenido</label>
                                            <input type="text" class="form-control" id="titulo_obtenido"
                                                name="titulo_obtenido"
                                                value="{{ old('titulo_obtenido', $destinatario->titulo_obtenido) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="estudiando_actualmente"
                                                    name="estudiando_actualmente" value="1" {{ old('estudiando_actualmente', $destinatario->estudiando_actualmente) ? 'checked' : '' }}
                                                    style="border: 1px solid #808080;">
                                                <label class="form-check-label" for="estudiando_actualmente"
                                                    style="color: #000000;">
                                                    ¿Está estudiando actualmente?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Datos de Salud -->
                            <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                                <div class="card-header"
                                    style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                    <h5 style="color: #000000; margin: 0;"><i class="bx bx-plus-medical"
                                            style="color: #dc3545;"></i> Datos de Salud</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="tiene_seguro_salud"
                                                    name="tiene_seguro_salud" value="1" {{ old('tiene_seguro_salud', $destinatario->tiene_seguro_salud) ? 'checked' : '' }}
                                                    style="border: 1px solid #808080;">
                                                <label class="form-check-label" for="tiene_seguro_salud"
                                                    style="color: #000000;">
                                                    ¿Tiene seguro de salud?
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="tipo_seguro_salud" class="form-label" style="color: #000000;">Tipo
                                                de Seguro de Salud</label>
                                            <input type="text" class="form-control" id="tipo_seguro_salud"
                                                name="tipo_seguro_salud"
                                                value="{{ old('tipo_seguro_salud', $destinatario->tipo_seguro_salud) }}"
                                                style="border: 1px solid #808080; color: #000000;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label for="condiciones_medicas" class="form-label"
                                                style="color: #000000;">Condiciones Médicas</label>
                                            <textarea class="form-control" id="condiciones_medicas"
                                                name="condiciones_medicas" rows="2"
                                                style="border: 1px solid #808080; color: #000000;">{{ old('condiciones_medicas', $destinatario->condiciones_medicas) }}</textarea>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="medicamentos_permanentes" class="form-label"
                                                style="color: #000000;">Medicamentos Permanentes</label>
                                            <textarea class="form-control" id="medicamentos_permanentes"
                                                name="medicamentos_permanentes" rows="2"
                                                style="border: 1px solid #808080; color: #000000;">{{ old('medicamentos_permanentes', $destinatario->medicamentos_permanentes) }}</textarea>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label for="alergias" class="form-label"
                                                style="color: #000000;">Alergias</label>
                                            <textarea class="form-control" id="alergias" name="alergias" rows="2"
                                                style="border: 1px solid #808080; color: #000000;">{{ old('alergias', $destinatario->alergias) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Estado y Observaciones -->
                            <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                                <div class="card-header"
                                    style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                    <h5 style="color: #000000; margin: 0;"><i class="bx bx-info-circle"
                                            style="color: #dc3545;"></i> Estado y Observaciones</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="estado" class="form-label" style="color: #000000;">Estado <span
                                                    style="color: #dc3545;">*</span></label>
                                            <select class="form-control @error('estado') is-invalid @enderror" id="estado"
                                                name="estado" style="border: 1px solid #808080; color: #000000;">
                                                <option value="activo" {{ old('estado', $destinatario->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                                                <option value="inactivo" {{ old('estado', $destinatario->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                                <option value="suspendido" {{ old('estado', $destinatario->estado) == 'suspendido' ? 'selected' : '' }}>Suspendido
                                                </option>
                                            </select>
                                            @error('estado')
                                                <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="observaciones" class="form-label"
                                                style="color: #000000;">Observaciones</label>
                                            <textarea class="form-control" id="observaciones" name="observaciones" rows="3"
                                                style="border: 1px solid #808080; color: #000000;">{{ old('observaciones', $destinatario->observaciones) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.destinatarios.index') }}" class="btn"
                                    style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
                                    Cancelar
                                </a>
                                <button type="submit" class="btn"
                                    style="background-color: #dc3545; color: #ffffff; border: none;">
                                    <i class="bx bx-save" style="color: #ffffff;"></i> Actualizar Destinatario
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection