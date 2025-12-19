@extends('layaout.app')

@section('title', 'Reportes Psicológicos')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #000000;">Reportes Psicológicos</h4>
                        <a href="{{ route('reports.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    <!-- Filtros -->
                    <form method="GET" action="{{ route('reports.psychological') }}" class="mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Estudiante</label>
                                <select name="student_id" class="form-control">
                                    <option value="">Todos</option>
                                    @foreach($students as $student)
                                        <option value="{{ $student->id }}" {{ request('student_id') == $student->id ? 'selected' : '' }}>
                                            {{ $student->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Nivel de Riesgo</label>
                                <select name="risk_level" class="form-control">
                                    <option value="">Todos</option>
                                    <option value="low" {{ request('risk_level') == 'low' ? 'selected' : '' }}>Bajo</option>
                                    <option value="medium" {{ request('risk_level') == 'medium' ? 'selected' : '' }}>Medio</option>
                                    <option value="high" {{ request('risk_level') == 'high' ? 'selected' : '' }}>Alto</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Fecha Inicio</label>
                                <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Fecha Fin</label>
                                <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                            </div>
                        </div>
                    </form>

                    <!-- Estadísticas -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h3>{{ $stats['total'] }}</h3>
                                    <p class="mb-0">Total Evaluaciones</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-danger text-white">
                                <div class="card-body text-center">
                                    <h3>{{ $stats['high_risk_count'] }}</h3>
                                    <p class="mb-0">Riesgo Alto</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-warning">
                                <div class="card-body text-center">
                                    <h3>{{ $stats['by_risk']->get('medium', 0) }}</h3>
                                    <p class="mb-0">Riesgo Medio</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h3>{{ $stats['students_count'] }}</h3>
                                    <p class="mb-0">Estudiantes Evaluados</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabla de registros -->
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Estudiante</th>
                                    <th>Motivo</th>
                                    <th>Nivel de Riesgo</th>
                                    <th>Psicólogo/a</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($records as $record)
                                    <tr>
                                        <td>{{ $record->evaluation_date->format('d/m/Y') }}</td>
                                        <td>{{ $record->student->name }}</td>
                                        <td>{{ Str::limit($record->reason, 50) }}</td>
                                        <td>
                                            @php
                                                $riskClass = 'bg-secondary';
                                                if ($record->risk_level === 'medium') $riskClass = 'bg-warning text-dark';
                                                if ($record->risk_level === 'high') $riskClass = 'bg-danger';
                                            @endphp
                                            <span class="badge {{ $riskClass }}">
                                                {{ ucfirst($record->risk_level) }}
                                            </span>
                                        </td>
                                        <td>{{ $record->psychologist->name }}</td>
                                        <td>
                                            <a href="{{ route('psychological-records.show', $record) }}" class="btn btn-sm btn-info">Ver</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No hay registros que coincidan con los filtros.</td>
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

