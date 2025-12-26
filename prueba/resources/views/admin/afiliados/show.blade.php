@extends('layaout.app')

@section('title', 'Ver Afiliado')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #000000;">Ficha Socioeconomica - {{ $afiliado->nombre_completo }}</h4>
                        <div>
                            <a href="{{ route('admin.afiliados.edit', $afiliado) }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                <i class="bx bx-edit" style="color: #ffffff;"></i> Editar
                            </a>
                            <a href="{{ route('admin.afiliados.index') }}" class="btn" style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    @php
                        $documentos = [
                            'cedula' => 'Cedula',
                            'pasaporte' => 'Pasaporte',
                            'tarjeta_identidad' => 'Tarjeta de identidad',
                            'cedula_extranjeria' => 'Cedula de extranjeria',
                        ];
                        $niveles = [
                            'inicial' => 'Inicial',
                            'basica' => 'Basica',
                            'bachillerato' => 'Bachillerato',
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

                    <div class="card mb-3" style="background-color: #f8f9fa; border: 1px solid #808080;">
                        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                            <h5 style="color: #000000; margin: 0;"><i class="bx bx-user" style="color: #dc3545;"></i> Datos Personales</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Documento:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $documentos[$afiliado->tipo_documento] ?? $afiliado->tipo_documento }}</div>
                                <div class="col-md-3"><strong style="color: #000000;">Numero:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->numero_documento }}</div>
                            </div>
                            <hr style="border-color: #808080;">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Fecha de Nacimiento:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ optional($afiliado->fecha_nacimiento)->format('d/m/Y') }}</div>
                                <div class="col-md-3"><strong style="color: #000000;">Edad:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->edad }} anios</div>
                            </div>
                            <hr style="border-color: #808080;">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Genero:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ ucfirst($afiliado->genero) }}</div>
                                <div class="col-md-3"><strong style="color: #000000;">Nacionalidad:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->nacionalidad }}</div>
                            </div>
                            <hr style="border-color: #808080;">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Lugar de Nacimiento:</strong></div>
                                <div class="col-md-9" style="color: #000000;">{{ $afiliado->lugar_nacimiento }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3" style="background-color: #f8f9fa; border: 1px solid #808080;">
                        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                            <h5 style="color: #000000; margin: 0;"><i class="bx bx-home" style="color: #dc3545;"></i> Residencia y Contacto</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Contacto:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->contacto_telefonico }}</div>
                                <div class="col-md-3"><strong style="color: #000000;">Celular:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->celular ?? 'N/A' }}</div>
                            </div>
                            <hr style="border-color: #808080;">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Direccion:</strong></div>
                                <div class="col-md-9" style="color: #000000;">{{ $afiliado->direccion_domicilio }}</div>
                            </div>
                            <hr style="border-color: #808080;">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Sector / Barrio:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->sector_barrio }}</div>
                                <div class="col-md-3"><strong style="color: #000000;">Ciudad:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->ciudad_residencia }}</div>
                            </div>
                            <hr style="border-color: #808080;">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Parroquia Civil:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->parroquia_civil }}</div>
                                <div class="col-md-3"><strong style="color: #000000;">Referencia:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->departamento_referencia }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3" style="background-color: #f8f9fa; border: 1px solid #808080;">
                        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                            <h5 style="color: #000000; margin: 0;"><i class="bx bx-briefcase" style="color: #dc3545;"></i> Representante</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Nombre:</strong></div>
                                <div class="col-md-9" style="color: #000000;">{{ $afiliado->nombre_representante }} {{ $afiliado->apellido_representante }}</div>
                            </div>
                            <hr style="border-color: #808080;">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Documento:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $documentos[$afiliado->tipo_documento_representante] ?? $afiliado->tipo_documento_representante }}</div>
                                <div class="col-md-3"><strong style="color: #000000;">Numero:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->numero_documento_representante }}</div>
                            </div>
                            <hr style="border-color: #808080;">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Parentesco:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->parentesco }}</div>
                                <div class="col-md-3"><strong style="color: #000000;">Ocupacion:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->ocupacion }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3" style="background-color: #f8f9fa; border: 1px solid #808080;">
                        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                            <h5 style="color: #000000; margin: 0;"><i class="bx bx-book" style="color: #dc3545;"></i> Educacion</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Estudia:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->estudia ? 'Si' : 'No' }}</div>
                                <div class="col-md-3"><strong style="color: #000000;">Nivel:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $niveles[$afiliado->nivel_educativo] ?? 'N/A' }}</div>
                            </div>
                            @if($afiliado->estudia)
                                <hr style="border-color: #808080;">
                                <div class="row">
                                    <div class="col-md-3"><strong style="color: #000000;">Institucion:</strong></div>
                                    <div class="col-md-9" style="color: #000000;">{{ $afiliado->institucion_educativa }}</div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="card mb-3" style="background-color: #f8f9fa; border: 1px solid #808080;">
                        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                            <h5 style="color: #000000; margin: 0;"><i class="bx bx-plus-medical" style="color: #dc3545;"></i> Salud</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Seguro:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $afiliado->tiene_seguro_salud ? 'Si' : 'No' }}</div>
                                <div class="col-md-3"><strong style="color: #000000;">Tipo:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ $seguros[$afiliado->tipo_seguro_salud] ?? 'N/A' }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="card mb-3" style="background-color: #f8f9fa; border: 1px solid #808080;">
                        <div class="card-header" style="background-color: #f8f9fa; border-bottom: 1px solid #808080;">
                            <h5 style="color: #000000; margin: 0;"><i class="bx bx-info-circle" style="color: #dc3545;"></i> Estado</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3"><strong style="color: #000000;">Estado:</strong></div>
                                <div class="col-md-3">
                                    <span class="badge" style="background-color: {{ $afiliado->estado === 'activo' ? '#28a745' : ($afiliado->estado === 'inactivo' ? '#ffc107' : '#dc3545') }}; color: #ffffff; border: 1px solid #808080;">
                                        {{ ucfirst($afiliado->estado) }}
                                    </span>
                                </div>
                                <div class="col-md-3"><strong style="color: #000000;">Fecha de Registro:</strong></div>
                                <div class="col-md-3" style="color: #000000;">{{ optional($afiliado->fecha_registro)->format('d/m/Y') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
