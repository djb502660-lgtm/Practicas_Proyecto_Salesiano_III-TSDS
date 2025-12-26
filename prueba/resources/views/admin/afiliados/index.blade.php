@extends('layaout.app')

@section('title', 'Afiliados')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-0" style="color: #000000;">Lista de Afiliados</h4>
                        </div>
                        <div class="d-flex align-items-center" style="gap: 10px;">
                            <form action="{{ route('admin.afiliados.index') }}" method="GET" class="d-flex" style="gap: 6px;">
                                <input type="text" class="form-control" name="q" value="{{ $search ?? '' }}" placeholder="Buscar por nombre o documento" style="border: 1px solid #808080; color: #000000;">
                                <button type="submit" class="btn" style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">Buscar</button>
                                @if(!empty($search))
                                    <a href="{{ route('admin.afiliados.index') }}" class="btn" style="background-color: #ffffff; color: #000000; border: 1px solid #808080;">Limpiar</a>
                                @endif
                            </form>
                            <a href="{{ route('admin.afiliados.create') }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                <i class="bx bx-plus" style="color: #ffffff;"></i> Nuevo Afiliado
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
                                    <th style="color: #000000; border: 1px solid #808080;">Nombre Completo</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Documento</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Ciudad</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Estado</th>
                                    <th style="color: #000000; border: 1px solid #808080;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($afiliados as $afiliado)
                                    <tr>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $afiliado->id }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $afiliado->nombre_completo }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $afiliado->numero_documento }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">{{ $afiliado->ciudad_residencia }}</td>
                                        <td style="color: #000000; border: 1px solid #808080;">
                                            <span class="badge" style="background-color: {{ $afiliado->estado === 'activo' ? '#28a745' : ($afiliado->estado === 'inactivo' ? '#ffc107' : '#dc3545') }}; color: #ffffff; border: 1px solid #808080;">
                                                {{ ucfirst($afiliado->estado) }}
                                            </span>
                                        </td>
                                        <td style="color: #000000; border: 1px solid #808080;">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.afiliados.show', $afiliado) }}" class="btn btn-sm" style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                    <i class="bx bx-show" style="color: #ffffff;"></i>
                                                </a>
                                                <a href="{{ route('admin.afiliados.edit', $afiliado) }}" class="btn btn-sm" style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                    <i class="bx bx-edit" style="color: #ffffff;"></i>
                                                </a>
                                                <form action="{{ route('admin.afiliados.destroy', $afiliado) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Estás seguro de eliminar este afiliado?');">
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
                                        <td colspan="6" class="text-center" style="color: #000000; border: 1px solid #808080;">No hay afiliados registrados.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-3">
                        {{ $afiliados->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
