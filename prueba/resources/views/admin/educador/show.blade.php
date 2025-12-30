@extends('layaout.app')

@section('title', 'Ver Seguimiento Educador')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                    <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0" style="color: #000000;">Detalles del Seguimiento Educador</h4>
                            <div>
                                <a href="{{ route('admin.educador.edit', $educador) }}" class="btn"
                                    style="background-color: #dc3545; color: #ffffff; border: none;">
                                    <i class="bx bx-edit" style="color: #ffffff;"></i> Editar
                                </a>
                                <a href="{{ route('admin.educador.index') }}" class="btn"
                                    style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
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
                                        <h5 style="color: #000000;"><i class="bx bx-user" style="color: #dc3545;"></i>
                                            Información del Destinatario</h5>
                                        <hr style="border-color: #808080;">
                                        <p style="color: #000000;"><strong>Nombre:</strong>
                                            {{ $educador->destinatario->nombre_completo ?? 'N/A' }}</p>
                                        <p style="color: #000000;"><strong>Documento:</strong>
                                            {{ $educador->destinatario->numero_documento ?? 'N/A' }}</p>
                                        <p style="color: #000000;"><strong>Edad:</strong>
                                            {{ $educador->destinatario->edad ?? 'N/A' }} años</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                    <div class="card-body">
                                        <h5 style="color: #000000;"><i class="bx bx-calendar" style="color: #dc3545;"></i>
                                            Información del Registro</h5>
                                        <hr style="border-color: #808080;">
                                        <p style="color: #000000;"><strong>Tipo:</strong> {{ $educador->tipo_label }}</p>
                                        <p style="color: #000000;"><strong>Fecha:</strong>
                                            {{ $educador->fecha_registro->format('d/m/Y') }}</p>
                                        <p style="color: #000000;"><strong>Registrado por:</strong>
                                            {{ $educador->user->name ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                    <div class="card-body text-center">
                                        <h5 style="color: #000000;"><i class="bx bx-shield" style="color: #dc3545;"></i>
                                            Nivel de Riesgo</h5>
                                        <hr style="border-color: #808080;">
                                        <span class="badge"
                                            style="background-color: {{ $educador->nivel_riesgo_color }}; color: #ffffff; border: 1px solid #808080; padding: 12px 24px; font-size: 1.1em;">
                                            {{ $educador->nivel_riesgo_label }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                    <div class="card-body">
                                        <h5 style="color: #000000;"><i class="bx bx-book-open" style="color: #dc3545;"></i>
                                            Observación</h5>
                                        <hr style="border-color: #808080;">
                                        <p style="color: #000000;">{{ $educador->observacion }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($educador->acuerdos)
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                        <div class="card-body">
                                            <h5 style="color: #000000;"><i class="bx bx-check-square"
                                                    style="color: #dc3545;"></i> Acuerdos y Compromisos</h5>
                                            <hr style="border-color: #808080;">
                                            <p style="color: #000000;">{{ $educador->acuerdos }}</p>
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