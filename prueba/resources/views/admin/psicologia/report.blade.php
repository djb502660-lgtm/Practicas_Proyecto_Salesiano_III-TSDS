@extends('layaout.app')

@section('title', 'Reporte Psicologia')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #000000;">Reporte de Psicologia</h4>
                        <a href="{{ route('admin.psicologia.index') }}" class="btn" style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
                            Volver
                        </a>
                    </div>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                <div class="card-body">
                                    <h5 style="color: #000000;"><i class="bx bx-user" style="color: #dc3545;"></i> Informacion del Afiliado</h5>
                                    <hr style="border-color: #808080;">
                                    <p style="color: #000000;"><strong>Nombre:</strong> {{ $afiliado->nombre_completo }}</p>
                                    <p style="color: #000000;"><strong>Documento:</strong> {{ $afiliado->numero_documento }}</p>
                                    <p style="color: #000000;"><strong>Edad:</strong> {{ $afiliado->edad }} anios</p>
                                    <p style="color: #000000;"><strong>Genero:</strong> {{ ucfirst($afiliado->genero) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" style="border: 1px solid #808080; color: #000000;">
                            <thead style="background-color: #f8f9fa; border-bottom: 2px solid #808080;">
                                <tr>
                                    <th style="color: #000000; border: 1px solid #808080;">Fecha</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Tipo</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Estado Emocional</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Conducta</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Diagnostico</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Evolucion</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Riesgo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($registros as $registro)
                                    <tr>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $registro->fecha_registro->format('d/m/Y') }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $registro->tipo_label }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $registro->estado_emocional ?? 'N/A' }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $registro->conducta ?? 'N/A' }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $registro->diagnostico_inicial ?? 'N/A' }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $registro->evolucion ?? 'N/A' }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $registro->nivel_riesgo_label }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center" style="color: #000000; border: 1px solid #808080;">No hay registros para este afiliado.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
