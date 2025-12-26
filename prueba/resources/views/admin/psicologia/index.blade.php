@extends('layaout.app')

@section('title', 'Psicologia')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #000000;">Registro de Psicologia</h4>
                        <div>
                            <a href="{{ route('admin.psicologia.create') }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                <i class="bx bx-plus" style="color: #ffffff;"></i> Nuevo Registro
                            </a>
                            <a href="{{ route('admin.psicologia-alertas.index') }}" class="btn" style="background-color: #808080; color: #ffffff; border: none;">
                                <i class="bx bx-alarm" style="color: #ffffff;"></i>
                                Alertas
                                @if($alertasPendientes > 0)
                                    <span class="badge" style="background-color: #dc3545; color: #ffffff; margin-left: 4px;">
                                        {{ $alertasPendientes }}
                                    </span>
                                @endif
                            </a>
                        </div>
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
                                    <th style="color: #000000; border: 1px solid #808080;">Tipo</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Fecha</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Riesgo</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Registrado Por</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($registros as $registro)
                                    <tr>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $registro->id }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $registro->afiliado->nombre_completo }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $registro->tipo_label }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $registro->fecha_registro->format('d/m/Y') }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">
                                            @php
                                                $riesgoColor = match ($registro->nivel_riesgo) {
                                                    'bajo' => '#28a745',
                                                    'medio' => '#ffc107',
                                                    'alto' => '#dc3545',
                                                    default => '#808080',
                                                };
                                            @endphp
                                            <span class="badge" style="background-color: {{ $riesgoColor }}; color: #ffffff; border: 1px solid #808080;">
                                                {{ ucfirst($registro->nivel_riesgo) }}
                                            </span>
                                        </td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $registro->user->name ?? 'N/A' }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.psicologia.show', $registro) }}" class="btn btn-sm" style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                    <i class="bx bx-show" style="color: #ffffff;"></i>
                                                </a>
                                                <a href="{{ route('admin.psicologia.edit', $registro) }}" class="btn btn-sm" style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                    <i class="bx bx-edit" style="color: #ffffff;"></i>
                                                </a>
                                                <a href="{{ route('admin.psicologia.report', $registro->afiliado) }}" class="btn btn-sm" style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
                                                    <i class="bx bx-file" style="color: #ffffff;"></i>
                                                </a>
                                                <form action="{{ route('admin.psicologia.destroy', $registro) }}" method="POST" class="d-inline" onsubmit="return confirm('Esta seguro de eliminar este registro?');">
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
                                        <td colspan="7" class="text-center" style="color: #000000; border: 1px solid #808080;">No hay registros de psicologia.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $registros->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
