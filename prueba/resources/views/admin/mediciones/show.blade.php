@extends('layaout.app')

@section('title', 'Ver Medición')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #000000;">Detalles de la Medición</h4>
                        <div>
                            <a href="{{ route('admin.mediciones.edit', $medicion) }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                <i class="bx bx-edit" style="color: #ffffff;"></i> Editar
                            </a>
                            <a href="{{ route('admin.mediciones.index') }}" class="btn" style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                <div class="card-body">
                                    <h5 style="color: #000000;"><i class="bx bx-user" style="color: #dc3545;"></i> Información del Afiliado</h5>
                                    <hr style="border-color: #808080;">
                                    <p style="color: #000000;"><strong>Nombre:</strong> {{ $medicion->afiliado->nombre_completo }}</p>
                                    <p style="color: #000000;"><strong>Documento:</strong> {{ $medicion->afiliado->numero_documento }}</p>
                                    <p style="color: #000000;"><strong>Edad:</strong> {{ $medicion->afiliado->edad }} años</p>
                                    <p style="color: #000000;"><strong>Género:</strong> {{ ucfirst($medicion->afiliado->genero) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                <div class="card-body">
                                    <h5 style="color: #000000;"><i class="bx bx-calendar" style="color: #dc3545;"></i> Información de la Medición</h5>
                                    <hr style="border-color: #808080;">
                                    <p style="color: #000000;"><strong>Fecha de Medición:</strong> {{ $medicion->fecha_medicion->format('d/m/Y') }}</p>
                                    <p style="color: #000000;"><strong>Registrado por:</strong> {{ $medicion->user->name ?? 'N/A' }}</p>
                                    <p style="color: #000000;"><strong>Fecha de Registro:</strong> {{ $medicion->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                <div class="card-body text-center">
                                    <h5 style="color: #000000;"><i class="bx bx-line-chart" style="color: #dc3545;"></i> Mediciones</h5>
                                    <hr style="border-color: #808080;">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h3 style="color: #000000;">{{ number_format($medicion->peso, 2) }} kg</h3>
                                            <p style="color: #000000;">Peso</p>
                                        </div>
                                        <div class="col-md-4">
                                            <h3 style="color: #000000;">{{ number_format($medicion->talla, 2) }} m</h3>
                                            <p style="color: #000000;">Talla</p>
                                        </div>
                                        <div class="col-md-4">
                                            <h3 style="color: {{ $medicion->clasificacion_color }};">{{ number_format($medicion->imc, 2) }}</h3>
                                            <p style="color: #000000;">IMC</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                <div class="card-body text-center">
                                    <h5 style="color: #000000;"><i class="bx bx-info-circle" style="color: #dc3545;"></i> Clasificación</h5>
                                    <hr style="border-color: #808080;">
                                    <span class="badge" style="background-color: {{ $medicion->clasificacion_color }}; color: #ffffff; border: 1px solid #808080; padding: 15px 30px; font-size: 1.2em;">
                                        {{ $medicion->clasificacion_label }}
                                    </span>
                                    <div class="mt-3">
                                        @if($medicion->clasificacion === 'desnutricion')
                                            <p style="color: #000000;">El IMC indica un estado de desnutrición. Se recomienda seguimiento nutricional.</p>
                                        @elseif($medicion->clasificacion === 'peso_normal')
                                            <p style="color: #000000;">El IMC está dentro del rango normal. Mantener hábitos saludables.</p>
                                        @elseif($medicion->clasificacion === 'sobrepeso')
                                            <p style="color: #000000;">El IMC indica sobrepeso. Se recomienda consulta nutricional y actividad física.</p>
                                        @else
                                            <p style="color: #000000;">El IMC indica obesidad. Se requiere seguimiento médico y nutricional especializado.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($medicion->observaciones)
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                    <div class="card-body">
                                        <h5 style="color: #000000;"><i class="bx bx-note" style="color: #dc3545;"></i> Observaciones</h5>
                                        <hr style="border-color: #808080;">
                                        <p style="color: #000000;">{{ $medicion->observaciones }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
