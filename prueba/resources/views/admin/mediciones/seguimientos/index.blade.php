@extends('layaout.app')

@section('title', 'Seguimiento de Peso y Talla')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                    <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0" style="color: #000000;">Historial de Seguimiento (6 Meses)</h4>
                            <a href="{{ route('admin.mediciones.index') }}" class="btn"
                                style="background-color: #808080; color: #ffffff; border: none;">
                                <i class="bx bx-arrow-back" style="color: #ffffff;"></i> Volver a Mediciones
                            </a>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #ffffff;">
                        <!-- Filtros y Búsqueda -->
                        <form action="{{ route('admin.seguimientos.index') }}" method="GET" class="mb-4">
                            <div class="row align-items-end">
                                <div class="col-md-4">
                                    <label class="form-label" style="color: #000000;">Buscar Destinatario</label>
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Nombre o apellido..." value="{{ request('search') }}"
                                            style="border-color: #808080;">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" style="color: #000000;">Estado</label>
                                    <select name="status" class="form-control" style="border-color: #808080;">
                                        <option value="">Todos</option>
                                        <option value="realizado" {{ request('status') == 'realizado' ? 'selected' : '' }}>
                                            Realizado</option>
                                        <option value="pendiente" {{ request('status') == 'pendiente' ? 'selected' : '' }}>
                                            Pendiente</option>
                                    </select>
                                </div>
                                <div class="col-md-5">
                                    <button type="submit" class="btn" style="background-color: #dc3545; color: #ffffff;">
                                        <i class="bx bx-search"></i> Filtrar
                                    </button>
                                    <a href="{{ route('admin.seguimientos.index') }}" class="btn"
                                        style="background-color: #808080; color: #ffffff;">
                                        <i class="bx bx-refresh"></i> Limpiar
                                    </a>
                                </div>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table class="table table-bordered" style="border: 1px solid #808080; color: #000000;">
                                <thead style="background-color: #f8f9fa; border-bottom: 2px solid #808080;">
                                    <tr>
                                        <th style="color: #000000; border: 1px solid #808080;">Destinatario</th>
                                        <th style="color: #000000; border: 1px solid #808080;">Fecha Registro</th>
                                        <th style="color: #000000; border: 1px solid #808080;">Próximo Seguimiento</th>
                                        <th style="color: #000000; border: 1px solid #808080;">Estado</th>
                                        <th style="color: #000000; border: 1px solid #808080;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($seguimientos as $seguimiento)
                                        <tr>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                {{ $seguimiento->destinatario->nombre_completo }}
                                            </td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                {{ $seguimiento->fecha_seguimiento->format('d/m/Y') }}<br>
                                                <small
                                                    class="text-muted">{{ $seguimiento->created_at->format('H:i:s') }}</small>
                                            </td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                <strong>{{ $seguimiento->fecha_proximo_seguimiento->format('d/m/Y') }}</strong>
                                            </td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                <span class="badge"
                                                    style="background-color: {{ $seguimiento->estado == 'realizado' ? '#28a745' : '#ffc107' }}; color: #ffffff; border: 1px solid #808080;">
                                                    {{ ucfirst($seguimiento->estado) }}
                                                </span>
                                            </td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.mediciones.show', $seguimiento->medicion_id) }}"
                                                        class="btn btn-sm"
                                                        style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;"
                                                        title="Ver Medición">
                                                        <i class="bx bx-show" style="color: #ffffff;"></i>
                                                    </a>
                                                    <form action="{{ route('admin.seguimientos.destroy', $seguimiento) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('¿Estás seguro de eliminar este registro de seguimiento?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm"
                                                            style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                            <i class="bx bx-trash" style="color: #ffffff;"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center"
                                                style="color: #000000; border: 1px solid #808080;">No hay seguimientos
                                                registrados.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            {{ $seguimientos->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection