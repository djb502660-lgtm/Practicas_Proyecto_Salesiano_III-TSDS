@extends('layaout.app')

@section('title', 'Ver Destinatario')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                    <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0" style="color: #000000;">Ficha Socioeconómica -
                                {{ $destinatario->nombre_completo }}</h4>
                            <div>
                                <a href="{{ route('admin.destinatarios.edit', $destinatario) }}" class="btn"
                                    style="background-color: #dc3545; color: #ffffff; border: none;">
                                    <i class="bx bx-edit" style="color: #ffffff;"></i> Editar
                                </a>
                                <a href="{{ route('admin.destinatarios.index') }}" class="btn"
                                    style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
                                    Volver
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #ffffff;">
                        <!-- Datos Personales -->
                        <div class="card mb-3" style="background-color: #f8f9fa; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-user" style="color: #dc3545;"></i>
                                    Datos Personales</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Nombre Completo:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->nombre_completo }}</div>
                                    <div class="col-md-3"><strong style="color: #000000;">Edad:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->edad }} años</div>
                                </div>
                                <hr style="border-color: #808080;">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Fecha de Nacimiento:</strong>
                                    </div>
                                    <div class="col-md-3" style="color: #000000;">
                                        {{ $destinatario->fecha_nacimiento->format('d/m/Y') }}</div>
                                    <div class="col-md-3"><strong style="color: #000000;">Género:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ ucfirst($destinatario->genero) }}</div>
                                </div>
                                <hr style="border-color: #808080;">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Estado Civil:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">
                                        {{ ucfirst(str_replace('_', ' ', $destinatario->estado_civil)) }}</div>
                                    <div class="col-md-3"><strong style="color: #000000;">Nacionalidad:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->nacionalidad }}</div>
                                </div>
                                <hr style="border-color: #808080;">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Tipo de Documento:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">
                                        {{ ucfirst(str_replace('_', ' ', $destinatario->tipo_documento)) }}</div>
                                    <div class="col-md-3"><strong style="color: #000000;">Número de Documento:</strong>
                                    </div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->numero_documento }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Datos de Contacto -->
                        <div class="card mb-3" style="background-color: #f8f9fa; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-phone" style="color: #dc3545;"></i>
                                    Datos de Contacto</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Teléfono:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->telefono ?? 'N/A' }}
                                    </div>
                                    <div class="col-md-3"><strong style="color: #000000;">Celular:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->celular ?? 'N/A' }}
                                    </div>
                                </div>
                                <hr style="border-color: #808080;">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Email:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->email ?? 'N/A' }}</div>
                                </div>
                                <hr style="border-color: #808080;">
                                <div class="row">
                                    <div class="col-md-12"><strong style="color: #000000;">Dirección:</strong></div>
                                    <div class="col-md-12" style="color: #000000;">{{ $destinatario->direccion_residencia }}
                                    </div>
                                </div>
                                <hr style="border-color: #808080;">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Barrio:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->barrio ?? 'N/A' }}</div>
                                    <div class="col-md-3"><strong style="color: #000000;">Ciudad:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->ciudad }}</div>
                                </div>
                                <hr style="border-color: #808080;">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Departamento:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->departamento }}</div>
                                    <div class="col-md-3"><strong style="color: #000000;">País:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->pais }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- Datos Familiares -->
                        <div class="card mb-3" style="background-color: #f8f9fa; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-group" style="color: #dc3545;"></i>
                                    Datos Familiares</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Cónyuge:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">
                                        {{ $destinatario->nombre_conyuge ?? 'N/A' }}</div>
                                    <div class="col-md-3"><strong style="color: #000000;">Número de Hijos:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->numero_hijos }}</div>
                                </div>
                                <hr style="border-color: #808080;">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Personas a Cargo:</strong></div>
                                    <div class="col-md-9" style="color: #000000;">{{ $destinatario->personas_a_cargo }}
                                    </div>
                                </div>
                                @if($destinatario->informacion_familiar)
                                    <hr style="border-color: #808080;">
                                    <div class="row">
                                        <div class="col-md-12"><strong style="color: #000000;">Información Familiar:</strong>
                                        </div>
                                        <div class="col-md-12" style="color: #000000;">{{ $destinatario->informacion_familiar }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Datos Laborales -->
                        <div class="card mb-3" style="background-color: #f8f9fa; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-briefcase"
                                        style="color: #dc3545;"></i> Datos Laborales</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Ocupación:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->ocupacion ?? 'N/A' }}
                                    </div>
                                    <div class="col-md-3"><strong style="color: #000000;">Tipo de Empleo:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">
                                        {{ $destinatario->tipo_empleo ? ucfirst($destinatario->tipo_empleo) : 'N/A' }}</div>
                                </div>
                                <hr style="border-color: #808080;">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Lugar de Trabajo:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">
                                        {{ $destinatario->lugar_trabajo ?? 'N/A' }}</div>
                                    <div class="col-md-3"><strong style="color: #000000;">Cargo:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">{{ $destinatario->cargo ?? 'N/A' }}</div>
                                </div>
                                @if($destinatario->ingresos_mensuales)
                                    <hr style="border-color: #808080;">
                                    <div class="row">
                                        <div class="col-md-3"><strong style="color: #000000;">Ingresos Mensuales:</strong></div>
                                        <div class="col-md-9" style="color: #000000;">
                                            ${{ number_format($destinatario->ingresos_mensuales, 2, ',', '.') }}</div>
                                    </div>
                                @endif
                                @if($destinatario->descripcion_laboral)
                                    <hr style="border-color: #808080;">
                                    <div class="row">
                                        <div class="col-md-12"><strong style="color: #000000;">Descripción Laboral:</strong>
                                        </div>
                                        <div class="col-md-12" style="color: #000000;">{{ $destinatario->descripcion_laboral }}
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Datos Educativos -->
                        <div class="card mb-3" style="background-color: #f8f9fa; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-book" style="color: #dc3545;"></i>
                                    Datos Educativos</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Nivel Educativo:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">
                                        {{ $destinatario->nivel_educativo ? ucfirst($destinatario->nivel_educativo) : 'N/A' }}
                                    </div>
                                    <div class="col-md-3"><strong style="color: #000000;">Estudiando Actualmente:</strong>
                                    </div>
                                    <div class="col-md-3" style="color: #000000;">
                                        {{ $destinatario->estudiando_actualmente ? 'Sí' : 'No' }}</div>
                                </div>
                                @if($destinatario->institucion_educativa)
                                    <hr style="border-color: #808080;">
                                    <div class="row">
                                        <div class="col-md-3"><strong style="color: #000000;">Institución Educativa:</strong>
                                        </div>
                                        <div class="col-md-9" style="color: #000000;">{{ $destinatario->institucion_educativa }}
                                        </div>
                                    </div>
                                @endif
                                @if($destinatario->titulo_obtenido)
                                    <hr style="border-color: #808080;">
                                    <div class="row">
                                        <div class="col-md-3"><strong style="color: #000000;">Título Obtenido:</strong></div>
                                        <div class="col-md-9" style="color: #000000;">{{ $destinatario->titulo_obtenido }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Datos de Salud -->
                        <div class="card mb-3" style="background-color: #f8f9fa; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-plus-medical"
                                        style="color: #dc3545;"></i> Datos de Salud</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Tiene Seguro de Salud:</strong>
                                    </div>
                                    <div class="col-md-3" style="color: #000000;">
                                        {{ $destinatario->tiene_seguro_salud ? 'Sí' : 'No' }}</div>
                                    @if($destinatario->tipo_seguro_salud)
                                        <div class="col-md-3"><strong style="color: #000000;">Tipo de Seguro:</strong></div>
                                        <div class="col-md-3" style="color: #000000;">{{ $destinatario->tipo_seguro_salud }}
                                        </div>
                                    @endif
                                </div>
                                @if($destinatario->condiciones_medicas)
                                    <hr style="border-color: #808080;">
                                    <div class="row">
                                        <div class="col-md-12"><strong style="color: #000000;">Condiciones Médicas:</strong>
                                        </div>
                                        <div class="col-md-12" style="color: #000000;">{{ $destinatario->condiciones_medicas }}
                                        </div>
                                    </div>
                                @endif
                                @if($destinatario->medicamentos_permanentes)
                                    <hr style="border-color: #808080;">
                                    <div class="row">
                                        <div class="col-md-12"><strong style="color: #000000;">Medicamentos
                                                Permanentes:</strong></div>
                                        <div class="col-md-12" style="color: #000000;">
                                            {{ $destinatario->medicamentos_permanentes }}</div>
                                    </div>
                                @endif
                                @if($destinatario->alergias)
                                    <hr style="border-color: #808080;">
                                    <div class="row">
                                        <div class="col-md-12"><strong style="color: #000000;">Alergias:</strong></div>
                                        <div class="col-md-12" style="color: #000000;">{{ $destinatario->alergias }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Estado y Observaciones -->
                        <div class="card mb-3" style="background-color: #f8f9fa; border: 1px solid #808080;">
                            <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                                <h5 style="color: #000000; margin: 0;"><i class="bx bx-info-circle"
                                        style="color: #dc3545;"></i> Estado y Observaciones</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Estado:</strong></div>
                                    <div class="col-md-3">
                                        <span class="badge"
                                            style="background-color: {{ $destinatario->estado === 'activo' ? '#28a745' : ($destinatario->estado === 'inactivo' ? '#ffc107' : '#dc3545') }}; color: #ffffff; border: 1px solid #808080;">
                                            {{ ucfirst($destinatario->estado) }}
                                        </span>
                                    </div>
                                    <div class="col-md-3"><strong style="color: #000000;">Fecha de Registro:</strong></div>
                                    <div class="col-md-3" style="color: #000000;">
                                        {{ $destinatario->fecha_registro->format('d/m/Y') }}</div>
                                </div>
                                @if($destinatario->observaciones)
                                    <hr style="border-color: #808080;">
                                    <div class="row">
                                        <div class="col-md-12"><strong style="color: #000000;">Observaciones:</strong></div>
                                        <div class="col-md-12" style="color: #000000;">{{ $destinatario->observaciones }}</div>
                                    </div>
                                @endif
                                @if($destinatario->user)
                                    <hr style="border-color: #808080;">
                                    <div class="row">
                                        <div class="col-md-3"><strong style="color: #000000;">Registrado por:</strong></div>
                                        <div class="col-md-9" style="color: #000000;">{{ $destinatario->user->name }}</div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection