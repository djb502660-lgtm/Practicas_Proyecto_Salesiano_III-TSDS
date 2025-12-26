@extends('layaout.app')

@section('title', 'Ver Registro Psicologia')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #000000;">Detalles del Registro</h4>
                        <div>
                            <a href="{{ route('admin.psicologia.edit', $psicologia) }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                <i class="bx bx-edit" style="color: #ffffff;"></i> Editar
                            </a>
                            <a href="{{ route('admin.psicologia.index') }}" class="btn" style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
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
                                    <h5 style="color: #000000;"><i class="bx bx-user" style="color: #dc3545;"></i> Informacion del Afiliado</h5>
                                    <hr style="border-color: #808080;">
                                    <p style="color: #000000;"><strong>Nombre:</strong> {{ $psicologia->afiliado->nombre_completo }}</p>
                                    <p style="color: #000000;"><strong>Documento:</strong> {{ $psicologia->afiliado->numero_documento }}</p>
                                    <p style="color: #000000;"><strong>Edad:</strong> {{ $psicologia->afiliado->edad }} anios</p>
                                    <p style="color: #000000;"><strong>Genero:</strong> {{ ucfirst($psicologia->afiliado->genero) }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                <div class="card-body">
                                    <h5 style="color: #000000;"><i class="bx bx-calendar" style="color: #dc3545;"></i> Informacion del Registro</h5>
                                    <hr style="border-color: #808080;">
                                    <p style="color: #000000;"><strong>Tipo:</strong> {{ $psicologia->tipo_label }}</p>
                                    <p style="color: #000000;"><strong>Fecha:</strong> {{ $psicologia->fecha_registro->format('d/m/Y') }}</p>
                                    <p style="color: #000000;"><strong>Registrado por:</strong> {{ $psicologia->user->name ?? 'N/A' }}</p>
                                    <p style="color: #000000;"><strong>Fecha de Registro:</strong> {{ $psicologia->created_at->format('d/m/Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                <div class="card-body text-center">
                                    <h5 style="color: #000000;"><i class="bx bx-shield" style="color: #dc3545;"></i> Nivel de Riesgo</h5>
                                    <hr style="border-color: #808080;">
                                    <span class="badge" style="background-color: {{ $psicologia->nivel_riesgo_color }}; color: #ffffff; border: 1px solid #808080; padding: 12px 24px; font-size: 1.1em;">
                                        {{ $psicologia->nivel_riesgo_label }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                <div class="card-body">
                                    <h5 style="color: #000000;"><i class="bx bx-happy" style="color: #dc3545;"></i> Estado Emocional</h5>
                                    <hr style="border-color: #808080;">
                                    <p style="color: #000000;">{{ $psicologia->estado_emocional ?? 'Sin detalles' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                <div class="card-body">
                                    <h5 style="color: #000000;"><i class="bx bx-bug" style="color: #dc3545;"></i> Conducta</h5>
                                    <hr style="border-color: #808080;">
                                    <p style="color: #000000;">{{ $psicologia->conducta ?? 'Sin detalles' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($psicologia->tipo === 'evaluacion')
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                    <div class="card-body">
                                        <h5 style="color: #000000;"><i class="bx bx-note" style="color: #dc3545;"></i> Diagnostico Inicial</h5>
                                        <hr style="border-color: #808080;">
                                        <p style="color: #000000;">{{ $psicologia->diagnostico_inicial ?? 'Sin detalles' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                    <div class="card-body">
                                        <h5 style="color: #000000;"><i class="bx bx-trending-up" style="color: #dc3545;"></i> Evolucion</h5>
                                        <hr style="border-color: #808080;">
                                        <p style="color: #000000;">{{ $psicologia->evolucion ?? 'Sin detalles' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if($psicologia->observaciones)
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                    <div class="card-body">
                                        <h5 style="color: #000000;"><i class="bx bx-message-detail" style="color: #dc3545;"></i> Observaciones</h5>
                                        <hr style="border-color: #808080;">
                                        <p style="color: #000000;">{{ $psicologia->observaciones }}</p>
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
