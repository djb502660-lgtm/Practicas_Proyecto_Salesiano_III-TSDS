@extends('layaout.app')

@section('title', 'Alertas Psicológicas')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Alertas de Riesgo Alto -->
            <div class="card mb-4" style="background-color: #ffffff; border: 1px solid #dc3545;">
                <div class="card-header" style="background-color: #dc3545; color: #ffffff; border-bottom: 1px solid #dc3545;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="bx bx-error-circle"></i> Alertas de Riesgo Alto
                        </h4>
                        <span class="badge bg-light text-dark">{{ $highRiskRecords->count() }}</span>
                    </div>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    @if($highRiskRecords->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Estudiante</th>
                                        <th>Motivo</th>
                                        <th>Psicólogo/a</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($highRiskRecords as $record)
                                        <tr style="background-color: #fff5f5;">
                                            <td>{{ $record->evaluation_date->format('d/m/Y') }}</td>
                                            <td><strong>{{ $record->student->name }}</strong></td>
                                            <td>{{ Str::limit($record->reason, 50) }}</td>
                                            <td>{{ $record->psychologist->name }}</td>
                                            <td>
                                                <a href="{{ route('psychological-records.show', $record) }}" class="btn btn-sm btn-danger">Ver Detalles</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No hay alertas de riesgo alto en este momento.
                        </div>
                    @endif
                </div>
            </div>

            <!-- Alertas de Riesgo Medio -->
            <div class="card" style="background-color: #ffffff; border: 1px solid #ffc107;">
                <div class="card-header" style="background-color: #ffc107; color: #000000; border-bottom: 1px solid #ffc107;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">
                            <i class="bx bx-info-circle"></i> Alertas de Riesgo Medio
                        </h4>
                        <span class="badge bg-dark text-white">{{ $mediumRiskRecords->count() }}</span>
                    </div>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    @if($mediumRiskRecords->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Estudiante</th>
                                        <th>Motivo</th>
                                        <th>Psicólogo/a</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($mediumRiskRecords as $record)
                                        <tr style="background-color: #fffbf0;">
                                            <td>{{ $record->evaluation_date->format('d/m/Y') }}</td>
                                            <td><strong>{{ $record->student->name }}</strong></td>
                                            <td>{{ Str::limit($record->reason, 50) }}</td>
                                            <td>{{ $record->psychologist->name }}</td>
                                            <td>
                                                <a href="{{ route('psychological-records.show', $record) }}" class="btn btn-sm btn-warning">Ver Detalles</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No hay alertas de riesgo medio en este momento.
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('reports.index') }}" class="btn btn-secondary">Volver a Reportes</a>
            </div>
        </div>
    </div>
</div>
@endsection

