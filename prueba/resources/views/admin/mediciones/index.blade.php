@extends('layaout.app')

@section('title', 'Mediciones')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #000000;">Registro de Mediciones</h4>
                        <a href="{{ route('admin.mediciones.create') }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                            <i class="bx bx-plus" style="color: #ffffff;"></i> Nueva Medición
                        </a>
                    </div>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #d4edda; border: 1px solid #808080; color: #000000;">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered" style="border: 1px solid #808080; color: #000000;">
                            <thead style="background-color: #f8f9fa; border-bottom: 2px solid #808080;">
                                <tr>
                                    <th style="color: #000000; border: 1px solid #808080;">ID</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Afiliado</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Peso (kg)</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Talla (m)</th>
                                    <th style="color: #000000; border: 1px solid #808080;">IMC</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Clasificación</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Fecha</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($mediciones as $medicion)
                                    <tr>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $medicion->id }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $medicion->afiliado->nombre_completo }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ number_format($medicion->peso, 2) }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ number_format($medicion->talla, 2) }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ number_format($medicion->imc, 2) }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">
                                            <span class="badge" style="background-color: {{ $medicion->clasificacion_color }}; color: #ffffff; border: 1px solid #808080;">
                                                {{ $medicion->clasificacion_label }}
                                            </span>
                                        </td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $medicion->fecha_medicion->format('d/m/Y') }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.mediciones.show', $medicion) }}" class="btn btn-sm" style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                    <i class="bx bx-show" style="color: #ffffff;"></i>
                                                </a>
                                                <a href="{{ route('admin.mediciones.edit', $medicion) }}" class="btn btn-sm" style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                    <i class="bx bx-edit" style="color: #ffffff;"></i>
                                                </a>
                                                <form action="{{ route('admin.mediciones.destroy', $medicion) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar esta medición?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm" style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                        <i class="bx bx-trash" style="color: #ffffff;"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center" style="color: #000000; border: 1px solid #808080;">No hay mediciones registradas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $mediciones->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
