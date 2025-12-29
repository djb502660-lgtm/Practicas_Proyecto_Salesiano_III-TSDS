@extends('layaout.app')

@section('title', 'Destinatarios')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                    <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0" style="color: #000000;">Lista de Destinatarios</h4>
                            <a href="{{ route('admin.destinatarios.create') }}" class="btn"
                                style="background-color: #dc3545; color: #ffffff; border: none;">
                                <i class="bx bx-plus" style="color: #ffffff;"></i> Nuevo Destinatario
                            </a>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #ffffff;">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert"
                                style="background-color: #d4edda; border: 1px solid #808080; color: #000000;">
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
                                    @forelse($destinatarios as $destinatario)
                                        <tr>
                                            <td style="color: #000000; border: 1px solid #808080;">{{ $destinatario->id }}</td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                {{ $destinatario->nombre_completo }}</td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                {{ $destinatario->numero_documento }}</td>
                                            <td style="color: #000000; border: 1px solid #808080;">{{ $destinatario->ciudad }}
                                            </td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                <span class="badge"
                                                    style="background-color: {{ $destinatario->estado === 'activo' ? '#28a745' : ($destinatario->estado === 'inactivo' ? '#ffc107' : '#dc3545') }}; color: #ffffff; border: 1px solid #808080;">
                                                    {{ ucfirst($destinatario->estado) }}
                                                </span>
                                            </td>
                                            <td style="color: #000000; border: 1px solid #808080;">
                                                <div class="btn-group" role="group">
                                                    <a href="{{ route('admin.destinatarios.show', $destinatario) }}"
                                                        class="btn btn-sm"
                                                        style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                        <i class="bx bx-show" style="color: #ffffff;"></i>
                                                    </a>
                                                    <a href="{{ route('admin.destinatarios.edit', $destinatario) }}"
                                                        class="btn btn-sm"
                                                        style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">
                                                        <i class="bx bx-edit" style="color: #ffffff;"></i>
                                                    </a>
                                                    <form action="{{ route('admin.destinatarios.destroy', $destinatario) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('¿Estás seguro de eliminar este Destinatario?');">
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
                                            <td colspan="6" class="text-center"
                                                style="color: #000000; border: 1px solid #808080;">No hay Destinatarios
                                                registrados.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            {{ $destinatarios->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
