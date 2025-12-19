@extends('layaout.app')

@section('title', 'Reportes Nutricionales')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #000000;">Reportes Nutricionales</h4>
                        <a href="{{ route('reports.index') }}" class="btn btn-secondary">Volver</a>
                    </div>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    <!-- Filtros -->
                    <form method="GET" action="{{ route('reports.nutritional') }}" class="mb-4">
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
                                <label class="form-label">Clasificación</label>
                                <select name="classification" class="form-control">
                                    <option value="">Todas</option>
                                    <option value="Bajo Peso" {{ request('classification') == 'Bajo Peso' ? 'selected' : '' }}>Bajo Peso</option>
                                    <option value="Peso Normal" {{ request('classification') == 'Peso Normal' ? 'selected' : '' }}>Peso Normal</option>
                                    <option value="Sobrepeso" {{ request('classification') == 'Sobrepeso' ? 'selected' : '' }}>Sobrepeso</option>
                                    <option value="Obesidad" {{ request('classification') == 'Obesidad' ? 'selected' : '' }}>Obesidad</option>
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
                                    <p class="mb-0">Total Registros</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h3>{{ number_format($stats['avg_imc'], 2) }}</h3>
                                    <p class="mb-0">IMC Promedio</p>
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
                        <div class="col-md-3">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h3>{{ $stats['by_classification']->count() }}</h3>
                                    <p class="mb-0">Clasificaciones</p>
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
                                    <th>Peso (kg)</th>
                                    <th>Altura (cm)</th>
                                    <th>IMC</th>
                                    <th>Clasificación</th>
                                    <th>Registrado por</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($records as $record)
                                    <tr>
                                        <td>{{ $record->record_date->format('d/m/Y') }}</td>
                                        <td>{{ $record->student->name }}</td>
                                        <td>{{ $record->weight_kg }}</td>
                                        <td>{{ $record->height_cm }}</td>
                                        <td>{{ $record->imc }}</td>
                                        <td>
                                            <span class="badge bg-secondary">{{ $record->classification }}</span>
                                        </td>
                                        <td>{{ $record->recorder->name }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No hay registros que coincidan con los filtros.</td>
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

