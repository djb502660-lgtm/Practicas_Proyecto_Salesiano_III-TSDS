@extends('layaout.app')

@section('title', 'Editar Afiliado')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <h4 class="mb-0" style="color: #000000;">Editar Afiliado: {{ $afiliado->nombre_completo }}</h4>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    @php
                        $instituciones = [
                            'Unidad Educativa Fiscomisional San Lorenzo',
                            'Colegio Nacional Tecnico 22 de Marzo',
                            'Escuela EGB Mariscal Sucre',
                            'Unidad Educativa Fiscomisional 10 de Agosto',
                            'Escuela de Educacion Basica 26 de Agosto',
                            'Unidad Educativa Quito Luz de America',
                            'UNIDAD EDUCATIVA NESTOR BARAHONA GRUEZO',
                            'UNIDAD EDUCATIVA JOSE OTILIO RAMIREZ REINA',
                            'UNIDAD EDUCATIVA ELEODORO AYALA',
                            'Instituto Fiscomisional Gratuito de Educacion Especial "Nuevos Pasos"',
                        ];
                        $seguros = [
                            'iess' => 'IESS',
                            'seguro_campesino' => 'Seguro Social Campesino',
                            'issfa' => 'Instituto de Seguridad Social de las Fuerzas Armadas (ISSFA)',
                            'isspol' => 'Instituto de Seguridad Social de la Policia Nacional (ISSPOL)',
                            'privado' => 'Seguro medico privado',
                            'ninguno' => 'Ninguno',
                        ];
                    @endphp

                    <form action="{{ route('admin.afiliados.update', $afiliado) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Datos Personales -->
                        <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-user" style="color: #dc3545;"></i> Datos Personales</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="primer_nombre" class="form-label" style="color: #000000;">Primer Nombre <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('primer_nombre') is-invalid @enderror" id="primer_nombre" name="primer_nombre" value="{{ old('primer_nombre', $afiliado->primer_nombre) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('primer_nombre')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="segundo_nombre" class="form-label" style="color: #000000;">Segundo Nombre <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('segundo_nombre') is-invalid @enderror" id="segundo_nombre" name="segundo_nombre" value="{{ old('segundo_nombre', $afiliado->segundo_nombre) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('segundo_nombre')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="primer_apellido" class="form-label" style="color: #000000;">Primer Apellido <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('primer_apellido') is-invalid @enderror" id="primer_apellido" name="primer_apellido" value="{{ old('primer_apellido', $afiliado->primer_apellido) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('primer_apellido')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="segundo_apellido" class="form-label" style="color: #000000;">Segundo Apellido <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('segundo_apellido') is-invalid @enderror" id="segundo_apellido" name="segundo_apellido" value="{{ old('segundo_apellido', $afiliado->segundo_apellido) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('segundo_apellido')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="tipo_documento" class="form-label" style="color: #000000;">Tipo de Documento <span style="color: #dc3545;">*</span></label>
                                        <select class="form-control @error('tipo_documento') is-invalid @enderror" id="tipo_documento" name="tipo_documento" style="border: 1px solid #808080; color: #000000;">
                                            <option value="">Seleccione...</option>
                                            <option value="cedula" {{ old('tipo_documento', $afiliado->tipo_documento) == 'cedula' ? 'selected' : '' }}>Cedula</option>
                                            <option value="pasaporte" {{ old('tipo_documento', $afiliado->tipo_documento) == 'pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                                            <option value="tarjeta_identidad" {{ old('tipo_documento', $afiliado->tipo_documento) == 'tarjeta_identidad' ? 'selected' : '' }}>Tarjeta de identidad</option>
                                            <option value="cedula_extranjeria" {{ old('tipo_documento', $afiliado->tipo_documento) == 'cedula_extranjeria' ? 'selected' : '' }}>Cedula de extranjeria</option>
                                        </select>
                                        @error('tipo_documento')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="numero_documento" class="form-label" style="color: #000000;">Numero de Documento <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('numero_documento') is-invalid @enderror" id="numero_documento" name="numero_documento" value="{{ old('numero_documento', $afiliado->numero_documento) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('numero_documento')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="nacionalidad" class="form-label" style="color: #000000;">Nacionalidad <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('nacionalidad') is-invalid @enderror" id="nacionalidad" name="nacionalidad" value="{{ old('nacionalidad', $afiliado->nacionalidad) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('nacionalidad')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="fecha_nacimiento" class="form-label" style="color: #000000;">Fecha de Nacimiento <span style="color: #dc3545;">*</span></label>
                                        <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', optional($afiliado->fecha_nacimiento)->format('Y-m-d')) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('fecha_nacimiento')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="edad" class="form-label" style="color: #000000;">Edad <span style="color: #dc3545;">*</span></label>
                                        <input type="number" class="form-control @error('edad') is-invalid @enderror" id="edad" name="edad" value="{{ old('edad', $afiliado->edad) }}" min="0" style="border: 1px solid #808080; color: #000000;">
                                        @error('edad')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="genero" class="form-label" style="color: #000000;">Genero <span style="color: #dc3545;">*</span></label>
                                        <select class="form-control @error('genero') is-invalid @enderror" id="genero" name="genero" style="border: 1px solid #808080; color: #000000;">
                                            <option value="">Seleccione...</option>
                                            <option value="masculino" {{ old('genero', $afiliado->genero) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                            <option value="femenino" {{ old('genero', $afiliado->genero) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                            <option value="otro" {{ old('genero', $afiliado->genero) == 'otro' ? 'selected' : '' }}>Otro</option>
                                        </select>
                                        @error('genero')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 mb-3">
                                        <label for="lugar_nacimiento" class="form-label" style="color: #000000;">Lugar de Nacimiento <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('lugar_nacimiento') is-invalid @enderror" id="lugar_nacimiento" name="lugar_nacimiento" value="{{ old('lugar_nacimiento', $afiliado->lugar_nacimiento) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('lugar_nacimiento')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="estado_civil" class="form-label" style="color: #000000;">Estado Civil</label>
                                        <select class="form-control @error('estado_civil') is-invalid @enderror" id="estado_civil" name="estado_civil" style="border: 1px solid #808080; color: #000000;">
                                            <option value="">Seleccione...</option>
                                            <option value="soltero" {{ old('estado_civil', $afiliado->estado_civil) == 'soltero' ? 'selected' : '' }}>Soltero</option>
                                            <option value="casado" {{ old('estado_civil', $afiliado->estado_civil) == 'casado' ? 'selected' : '' }}>Casado</option>
                                            <option value="divorciado" {{ old('estado_civil', $afiliado->estado_civil) == 'divorciado' ? 'selected' : '' }}>Divorciado</option>
                                            <option value="viudo" {{ old('estado_civil', $afiliado->estado_civil) == 'viudo' ? 'selected' : '' }}>Viudo</option>
                                            <option value="union_libre" {{ old('estado_civil', $afiliado->estado_civil) == 'union_libre' ? 'selected' : '' }}>Union libre</option>
                                        </select>
                                        @error('estado_civil')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Residencia y Contacto -->
                        <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-home" style="color: #dc3545;"></i> Residencia y Contacto</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="contacto_telefonico" class="form-label" style="color: #000000;">Contacto Telefonico <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('contacto_telefonico') is-invalid @enderror" id="contacto_telefonico" name="contacto_telefonico" value="{{ old('contacto_telefonico', $afiliado->contacto_telefonico) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('contacto_telefonico')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="telefono" class="form-label" style="color: #000000;">Telefono</label>
                                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono', $afiliado->telefono) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('telefono')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="celular" class="form-label" style="color: #000000;">Celular</label>
                                        <input type="text" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" value="{{ old('celular', $afiliado->celular) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('celular')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="email" class="form-label" style="color: #000000;">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $afiliado->email) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('email')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label for="direccion_domicilio" class="form-label" style="color: #000000;">Direccion de Domicilio <span style="color: #dc3545;">*</span></label>
                                        <textarea class="form-control @error('direccion_domicilio') is-invalid @enderror" id="direccion_domicilio" name="direccion_domicilio" rows="2" style="border: 1px solid #808080; color: #000000;">{{ old('direccion_domicilio', $afiliado->direccion_domicilio) }}</textarea>
                                        @error('direccion_domicilio')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="sector_barrio" class="form-label" style="color: #000000;">Sector / Barrio <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('sector_barrio') is-invalid @enderror" id="sector_barrio" name="sector_barrio" value="{{ old('sector_barrio', $afiliado->sector_barrio) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('sector_barrio')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="ciudad_residencia" class="form-label" style="color: #000000;">Ciudad de Residencia <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('ciudad_residencia') is-invalid @enderror" id="ciudad_residencia" name="ciudad_residencia" value="{{ old('ciudad_residencia', $afiliado->ciudad_residencia) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('ciudad_residencia')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="parroquia_civil" class="form-label" style="color: #000000;">Parroquia Civil <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('parroquia_civil') is-invalid @enderror" id="parroquia_civil" name="parroquia_civil" value="{{ old('parroquia_civil', $afiliado->parroquia_civil) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('parroquia_civil')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="departamento_referencia" class="form-label" style="color: #000000;">Departamento por Referencia <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('departamento_referencia') is-invalid @enderror" id="departamento_referencia" name="departamento_referencia" value="{{ old('departamento_referencia', $afiliado->departamento_referencia) }}" placeholder="Ej: Cerca de la iglesia" style="border: 1px solid #808080; color: #000000;">
                                        @error('departamento_referencia')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="departamento" class="form-label" style="color: #000000;">Departamento</label>
                                        <input type="text" class="form-control @error('departamento') is-invalid @enderror" id="departamento" name="departamento" value="{{ old('departamento', $afiliado->departamento) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('departamento')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="pais" class="form-label" style="color: #000000;">Pais</label>
                                        <input type="text" class="form-control @error('pais') is-invalid @enderror" id="pais" name="pais" value="{{ old('pais', $afiliado->pais) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('pais')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Discapacidad -->
                        <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-plus-medical" style="color: #dc3545;"></i> Discapacidad</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="tiene_discapacidad" class="form-label" style="color: #000000;">Tiene discapacidad <span style="color: #dc3545;">*</span></label>
                                        <select class="form-control @error('tiene_discapacidad') is-invalid @enderror" id="tiene_discapacidad" name="tiene_discapacidad" style="border: 1px solid #808080; color: #000000;">
                                            <option value="">Seleccione...</option>
                                            <option value="1" {{ old('tiene_discapacidad', $afiliado->tiene_discapacidad ? '1' : '0') === '1' ? 'selected' : '' }}>Si</option>
                                            <option value="0" {{ old('tiene_discapacidad', $afiliado->tiene_discapacidad ? '1' : '0') === '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('tiene_discapacidad')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="porcentaje_discapacidad" class="form-label" style="color: #000000;">Porcentaje de Discapacidad</label>
                                        <input type="number" class="form-control @error('porcentaje_discapacidad') is-invalid @enderror" id="porcentaje_discapacidad" name="porcentaje_discapacidad" value="{{ old('porcentaje_discapacidad', $afiliado->porcentaje_discapacidad) }}" min="0" max="100" style="border: 1px solid #808080; color: #000000;">
                                        @error('porcentaje_discapacidad')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Datos Familiares -->
                        <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-group" style="color: #dc3545;"></i> Datos Familiares</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="nombre_conyuge" class="form-label" style="color: #000000;">Nombre del Conyuge</label>
                                        <input type="text" class="form-control @error('nombre_conyuge') is-invalid @enderror" id="nombre_conyuge" name="nombre_conyuge" value="{{ old('nombre_conyuge', $afiliado->nombre_conyuge) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('nombre_conyuge')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="numero_hijos" class="form-label" style="color: #000000;">Numero de Hijos</label>
                                        <input type="number" class="form-control @error('numero_hijos') is-invalid @enderror" id="numero_hijos" name="numero_hijos" value="{{ old('numero_hijos', $afiliado->numero_hijos) }}" min="0" style="border: 1px solid #808080; color: #000000;">
                                        @error('numero_hijos')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="personas_a_cargo" class="form-label" style="color: #000000;">Personas a Cargo</label>
                                        <input type="number" class="form-control @error('personas_a_cargo') is-invalid @enderror" id="personas_a_cargo" name="personas_a_cargo" value="{{ old('personas_a_cargo', $afiliado->personas_a_cargo) }}" min="0" style="border: 1px solid #808080; color: #000000;">
                                        @error('personas_a_cargo')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="informacion_familiar" class="form-label" style="color: #000000;">Informacion Familiar Adicional</label>
                                        <textarea class="form-control @error('informacion_familiar') is-invalid @enderror" id="informacion_familiar" name="informacion_familiar" rows="3" style="border: 1px solid #808080; color: #000000;">{{ old('informacion_familiar', $afiliado->informacion_familiar) }}</textarea>
                                        @error('informacion_familiar')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Datos Laborales del Representante -->
                        <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-briefcase" style="color: #dc3545;"></i> Datos Laborales del Representante</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nombre_representante" class="form-label" style="color: #000000;">Nombre del Representante <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('nombre_representante') is-invalid @enderror" id="nombre_representante" name="nombre_representante" value="{{ old('nombre_representante', $afiliado->nombre_representante) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('nombre_representante')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="apellido_representante" class="form-label" style="color: #000000;">Apellido del Representante <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('apellido_representante') is-invalid @enderror" id="apellido_representante" name="apellido_representante" value="{{ old('apellido_representante', $afiliado->apellido_representante) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('apellido_representante')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="tipo_documento_representante" class="form-label" style="color: #000000;">Tipo de Documento <span style="color: #dc3545;">*</span></label>
                                        <select class="form-control @error('tipo_documento_representante') is-invalid @enderror" id="tipo_documento_representante" name="tipo_documento_representante" style="border: 1px solid #808080; color: #000000;">
                                            <option value="">Seleccione...</option>
                                            <option value="cedula" {{ old('tipo_documento_representante', $afiliado->tipo_documento_representante) == 'cedula' ? 'selected' : '' }}>Cedula</option>
                                            <option value="pasaporte" {{ old('tipo_documento_representante', $afiliado->tipo_documento_representante) == 'pasaporte' ? 'selected' : '' }}>Pasaporte</option>
                                            <option value="tarjeta_identidad" {{ old('tipo_documento_representante', $afiliado->tipo_documento_representante) == 'tarjeta_identidad' ? 'selected' : '' }}>Tarjeta de identidad</option>
                                            <option value="cedula_extranjeria" {{ old('tipo_documento_representante', $afiliado->tipo_documento_representante) == 'cedula_extranjeria' ? 'selected' : '' }}>Cedula de extranjeria</option>
                                        </select>
                                        @error('tipo_documento_representante')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="numero_documento_representante" class="form-label" style="color: #000000;">Numero de Documento <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('numero_documento_representante') is-invalid @enderror" id="numero_documento_representante" name="numero_documento_representante" value="{{ old('numero_documento_representante', $afiliado->numero_documento_representante) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('numero_documento_representante')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="parentesco" class="form-label" style="color: #000000;">Parentesco <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('parentesco') is-invalid @enderror" id="parentesco" name="parentesco" value="{{ old('parentesco', $afiliado->parentesco) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('parentesco')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="edad_representante" class="form-label" style="color: #000000;">Edad <span style="color: #dc3545;">*</span></label>
                                        <input type="number" class="form-control @error('edad_representante') is-invalid @enderror" id="edad_representante" name="edad_representante" value="{{ old('edad_representante', $afiliado->edad_representante) }}" min="0" style="border: 1px solid #808080; color: #000000;">
                                        @error('edad_representante')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="nivel_estudio" class="form-label" style="color: #000000;">Nivel de Estudio <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('nivel_estudio') is-invalid @enderror" id="nivel_estudio" name="nivel_estudio" value="{{ old('nivel_estudio', $afiliado->nivel_estudio) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('nivel_estudio')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="ocupacion" class="form-label" style="color: #000000;">Ocupacion <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('ocupacion') is-invalid @enderror" id="ocupacion" name="ocupacion" value="{{ old('ocupacion', $afiliado->ocupacion) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('ocupacion')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="lugar_trabajo" class="form-label" style="color: #000000;">Lugar de Trabajo <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('lugar_trabajo') is-invalid @enderror" id="lugar_trabajo" name="lugar_trabajo" value="{{ old('lugar_trabajo', $afiliado->lugar_trabajo) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('lugar_trabajo')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="tipo_empleo" class="form-label" style="color: #000000;">Tipo de Empleo <span style="color: #dc3545;">*</span></label>
                                        <select class="form-control @error('tipo_empleo') is-invalid @enderror" id="tipo_empleo" name="tipo_empleo" style="border: 1px solid #808080; color: #000000;">
                                            <option value="">Seleccione...</option>
                                            <option value="permanente" {{ old('tipo_empleo', $afiliado->tipo_empleo) == 'permanente' ? 'selected' : '' }}>Permanente</option>
                                            <option value="ocasional" {{ old('tipo_empleo', $afiliado->tipo_empleo) == 'ocasional' ? 'selected' : '' }}>Ocasional</option>
                                        </select>
                                        @error('tipo_empleo')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="ingresos_mensuales" class="form-label" style="color: #000000;">Ingresos Mensuales <span style="color: #dc3545;">*</span></label>
                                        <input type="number" step="0.01" class="form-control @error('ingresos_mensuales') is-invalid @enderror" id="ingresos_mensuales" name="ingresos_mensuales" value="{{ old('ingresos_mensuales', $afiliado->ingresos_mensuales) }}" min="0" style="border: 1px solid #808080; color: #000000;">
                                        @error('ingresos_mensuales')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="jornada_laboral" class="form-label" style="color: #000000;">Jornada Laboral <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('jornada_laboral') is-invalid @enderror" id="jornada_laboral" name="jornada_laboral" value="{{ old('jornada_laboral', $afiliado->jornada_laboral) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('jornada_laboral')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="dias_laborales" class="form-label" style="color: #000000;">Dias Laborales <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('dias_laborales') is-invalid @enderror" id="dias_laborales" name="dias_laborales" value="{{ old('dias_laborales', $afiliado->dias_laborales) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('dias_laborales')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="horario_trabajo" class="form-label" style="color: #000000;">Horario de Trabajo <span style="color: #dc3545;">*</span></label>
                                        <input type="text" class="form-control @error('horario_trabajo') is-invalid @enderror" id="horario_trabajo" name="horario_trabajo" value="{{ old('horario_trabajo', $afiliado->horario_trabajo) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('horario_trabajo')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Datos Educativos del Nino -->
                        <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-book" style="color: #dc3545;"></i> Datos Educativos del Nino</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="estudia" class="form-label" style="color: #000000;">Estudia <span style="color: #dc3545;">*</span></label>
                                        <select class="form-control @error('estudia') is-invalid @enderror" id="estudia" name="estudia" style="border: 1px solid #808080; color: #000000;">
                                            <option value="">Seleccione...</option>
                                            <option value="1" {{ old('estudia', $afiliado->estudia ? '1' : '0') === '1' ? 'selected' : '' }}>Si</option>
                                            <option value="0" {{ old('estudia', $afiliado->estudia ? '1' : '0') === '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('estudia')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="nivel_educativo" class="form-label" style="color: #000000;">Nivel Educativo</label>
                                        <select class="form-control @error('nivel_educativo') is-invalid @enderror" id="nivel_educativo" name="nivel_educativo" style="border: 1px solid #808080; color: #000000;">
                                            <option value="">Seleccione...</option>
                                            <option value="inicial" {{ old('nivel_educativo', $afiliado->nivel_educativo) == 'inicial' ? 'selected' : '' }}>Inicial</option>
                                            <option value="basica" {{ old('nivel_educativo', $afiliado->nivel_educativo) == 'basica' ? 'selected' : '' }}>Basica</option>
                                            <option value="bachillerato" {{ old('nivel_educativo', $afiliado->nivel_educativo) == 'bachillerato' ? 'selected' : '' }}>Bachillerato</option>
                                        </select>
                                        @error('nivel_educativo')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="jornada" class="form-label" style="color: #000000;">Jornada</label>
                                        <select class="form-control @error('jornada') is-invalid @enderror" id="jornada" name="jornada" style="border: 1px solid #808080; color: #000000;">
                                            <option value="">Seleccione...</option>
                                            <option value="matutina" {{ old('jornada', $afiliado->jornada) == 'matutina' ? 'selected' : '' }}>Matutina</option>
                                            <option value="vespertina" {{ old('jornada', $afiliado->jornada) == 'vespertina' ? 'selected' : '' }}>Vespertina</option>
                                            <option value="nocturna" {{ old('jornada', $afiliado->jornada) == 'nocturna' ? 'selected' : '' }}>Nocturna</option>
                                        </select>
                                        @error('jornada')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="institucion_educativa" class="form-label" style="color: #000000;">Institucion Educativa</label>
                                        <select class="form-control @error('institucion_educativa') is-invalid @enderror" id="institucion_educativa" name="institucion_educativa" style="border: 1px solid #808080; color: #000000;">
                                            <option value="">Seleccione...</option>
                                            @foreach($instituciones as $institucion)
                                                <option value="{{ $institucion }}" {{ old('institucion_educativa', $afiliado->institucion_educativa) == $institucion ? 'selected' : '' }}>{{ $institucion }}</option>
                                            @endforeach
                                        </select>
                                        @error('institucion_educativa')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="ultimo_anio_aprobado" class="form-label" style="color: #000000;">Ultimo Anio Aprobado</label>
                                        <input type="text" class="form-control @error('ultimo_anio_aprobado') is-invalid @enderror" id="ultimo_anio_aprobado" name="ultimo_anio_aprobado" value="{{ old('ultimo_anio_aprobado', $afiliado->ultimo_anio_aprobado) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('ultimo_anio_aprobado')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="representante_legal" class="form-label" style="color: #000000;">Representante Legal</label>
                                        <input type="text" class="form-control @error('representante_legal') is-invalid @enderror" id="representante_legal" name="representante_legal" value="{{ old('representante_legal', $afiliado->representante_legal) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('representante_legal')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Datos de Salud -->
                        <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-plus-medical" style="color: #dc3545;"></i> Datos de Salud</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="tiene_seguro_salud" class="form-label" style="color: #000000;">Tiene Seguro de Salud</label>
                                        <select class="form-control @error('tiene_seguro_salud') is-invalid @enderror" id="tiene_seguro_salud" name="tiene_seguro_salud" style="border: 1px solid #808080; color: #000000;">
                                            <option value="">Seleccione...</option>
                                            <option value="1" {{ old('tiene_seguro_salud', $afiliado->tiene_seguro_salud ? '1' : '0') === '1' ? 'selected' : '' }}>Si</option>
                                            <option value="0" {{ old('tiene_seguro_salud', $afiliado->tiene_seguro_salud ? '1' : '0') === '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('tiene_seguro_salud')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label for="tipo_seguro_salud" class="form-label" style="color: #000000;">Tipo de Seguro</label>
                                        <select class="form-control @error('tipo_seguro_salud') is-invalid @enderror" id="tipo_seguro_salud" name="tipo_seguro_salud" style="border: 1px solid #808080; color: #000000;">
                                            <option value="">Seleccione...</option>
                                            @foreach($seguros as $value => $label)
                                                <option value="{{ $value }}" {{ old('tipo_seguro_salud', $afiliado->tipo_seguro_salud) == $value ? 'selected' : '' }}>{{ $label }}</option>
                                            @endforeach
                                        </select>
                                        @error('tipo_seguro_salud')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="eps" class="form-label" style="color: #000000;">EPS</label>
                                        <input type="text" class="form-control @error('eps') is-invalid @enderror" id="eps" name="eps" value="{{ old('eps', $afiliado->eps) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('eps')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="condiciones_medicas" class="form-label" style="color: #000000;">Condiciones Medicas</label>
                                        <textarea class="form-control @error('condiciones_medicas') is-invalid @enderror" id="condiciones_medicas" name="condiciones_medicas" rows="2" style="border: 1px solid #808080; color: #000000;">{{ old('condiciones_medicas', $afiliado->condiciones_medicas) }}</textarea>
                                        @error('condiciones_medicas')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="medicamentos_permanentes" class="form-label" style="color: #000000;">Medicamentos Permanentes</label>
                                        <textarea class="form-control @error('medicamentos_permanentes') is-invalid @enderror" id="medicamentos_permanentes" name="medicamentos_permanentes" rows="2" style="border: 1px solid #808080; color: #000000;">{{ old('medicamentos_permanentes', $afiliado->medicamentos_permanentes) }}</textarea>
                                        @error('medicamentos_permanentes')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="alergias" class="form-label" style="color: #000000;">Alergias</label>
                                        <textarea class="form-control @error('alergias') is-invalid @enderror" id="alergias" name="alergias" rows="2" style="border: 1px solid #808080; color: #000000;">{{ old('alergias', $afiliado->alergias) }}</textarea>
                                        @error('alergias')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Estado y Observaciones -->
                        <div class="card mb-3" style="background-color: #ffffff; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-info-circle" style="color: #dc3545;"></i> Estado y Observaciones</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="estado" class="form-label" style="color: #000000;">Estado <span style="color: #dc3545;">*</span></label>
                                        <select class="form-control @error('estado') is-invalid @enderror" id="estado" name="estado" style="border: 1px solid #808080; color: #000000;">
                                            <option value="activo" {{ old('estado', $afiliado->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                                            <option value="inactivo" {{ old('estado', $afiliado->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                            <option value="suspendido" {{ old('estado', $afiliado->estado) == 'suspendido' ? 'selected' : '' }}>Suspendido</option>
                                        </select>
                                        @error('estado')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="fecha_registro" class="form-label" style="color: #000000;">Fecha de Registro <span style="color: #dc3545;">*</span></label>
                                        <input type="date" class="form-control @error('fecha_registro') is-invalid @enderror" id="fecha_registro" name="fecha_registro" value="{{ old('fecha_registro', optional($afiliado->fecha_registro)->format('Y-m-d')) }}" style="border: 1px solid #808080; color: #000000;">
                                        @error('fecha_registro')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="observaciones" class="form-label" style="color: #000000;">Observaciones</label>
                                        <textarea class="form-control @error('observaciones') is-invalid @enderror" id="observaciones" name="observaciones" rows="2" style="border: 1px solid #808080; color: #000000;">{{ old('observaciones', $afiliado->observaciones) }}</textarea>
                                        @error('observaciones')
                                            <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.afiliados.index') }}" class="btn" style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">Cancelar</a>
                            <button type="submit" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                <i class="bx bx-save" style="color: #ffffff;"></i> Actualizar Afiliado
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function toggleDiscapacidad() {
    const tiene = document.getElementById('tiene_discapacidad').value === '1';
    const porcentaje = document.getElementById('porcentaje_discapacidad');

    porcentaje.disabled = !tiene;
    if (!tiene) {
        porcentaje.value = '';
        porcentaje.removeAttribute('required');
    } else {
        porcentaje.setAttribute('required', 'required');
    }
}

function toggleEducacion() {
    const estudia = document.getElementById('estudia').value === '1';
    const campos = [
        document.getElementById('nivel_educativo'),
        document.getElementById('institucion_educativa'),
        document.getElementById('ultimo_anio_aprobado'),
        document.getElementById('jornada'),
        document.getElementById('representante_legal')
    ];

    campos.forEach((campo) => {
        campo.disabled = !estudia;
        if (!estudia) {
            campo.value = '';
            campo.removeAttribute('required');
        } else {
            campo.setAttribute('required', 'required');
        }
    });
}

function toggleSeguro() {
    const tieneSeguro = document.getElementById('tiene_seguro_salud').value === '1';
    const tipoSeguro = document.getElementById('tipo_seguro_salud');

    tipoSeguro.disabled = !tieneSeguro;
    if (!tieneSeguro) {
        tipoSeguro.value = '';
        tipoSeguro.removeAttribute('required');
    } else {
        tipoSeguro.setAttribute('required', 'required');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('tiene_discapacidad').addEventListener('change', toggleDiscapacidad);
    document.getElementById('estudia').addEventListener('change', toggleEducacion);
    document.getElementById('tiene_seguro_salud').addEventListener('change', toggleSeguro);

    toggleDiscapacidad();
    toggleEducacion();
    toggleSeguro();
});
</script>
@endsection
