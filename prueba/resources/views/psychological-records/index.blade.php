@extends('layaout.app')

@section('content')
<div class="container">
    <h1>Registros Psicológicos</h1>
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('psychological-records.create') }}" class="btn btn-primary">Nueva Evaluación</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
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
                    @forelse ($records as $record)
                        <tr>
                            <td>{{ $record->evaluation_date->format('d/m/Y') }}</td>
                            <td>{{ $record->student->name }}</td>
                            <td>{{ $record->reason }}</td>
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
                                <a href="{{ route('psychological-records.edit', $record) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('psychological-records.destroy', $record) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay registros psicológicos.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $records->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

