@extends('layaout.app')

@section('title', 'Registros Nutricionales')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #000000;">Registros Nutricionales</h4>
                        <a href="{{ route('nutritional-records.create') }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                            <i class="bx bx-plus" style="color: #ffffff;"></i> Nuevo Registro
                        </a>
                    </div>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

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
                                    <th>Acciones</th>
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
                                        <td>
                                            <a href="{{ route('nutritional-records.edit', $record) }}" class="btn btn-sm btn-warning">Editar</a>
                                            <form action="{{ route('nutritional-records.destroy', $record) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No hay registros nutricionales.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $records->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

