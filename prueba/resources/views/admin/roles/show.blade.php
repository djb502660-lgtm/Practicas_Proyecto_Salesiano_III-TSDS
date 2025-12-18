@extends('layaout.app')

@section('title', 'Ver Rol')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="mb-0" style="color: #000000;">Detalles del Rol</h4>
                        <div>
                            <a href="{{ route('admin.roles.edit', $role) }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                <i class="bx bx-edit" style="color: #ffffff;"></i> Editar
                            </a>
                            <a href="{{ route('admin.roles.index') }}" class="btn" style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
                                Volver
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong style="color: #000000;">ID:</strong>
                            <p style="color: #000000;">{{ $role->id }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong style="color: #000000;">Nombre:</strong>
                            <p style="color: #000000;">{{ $role->name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <strong style="color: #000000;">Slug:</strong>
                            <p style="color: #000000;">{{ $role->slug }}</p>
                        </div>
                        <div class="col-md-6">
                            <strong style="color: #000000;">Fecha de Creación:</strong>
                            <p style="color: #000000;">{{ $role->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>

                    @if($role->description)
                        <div class="row mb-3">
                            <div class="col-12">
                                <strong style="color: #000000;">Descripción:</strong>
                                <p style="color: #000000;">{{ $role->description }}</p>
                            </div>
                        </div>
                    @endif

                    <div class="row mb-3">
                        <div class="col-12">
                            <strong style="color: #000000;">Permisos:</strong>
                            <div class="mt-2">
                                @forelse($role->permissions as $permission)
                                    <span class="badge me-2 mb-2" style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080; padding: 8px 12px;">
                                        <i class="bx bx-check" style="color: #ffffff;"></i> {{ $permission->name }}
                                    </span>
                                @empty
                                    <p style="color: #000000;">Sin permisos asignados</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-12">
                            <strong style="color: #000000;">Usuarios con este rol:</strong>
                            <div class="mt-2">
                                @forelse($role->users as $user)
                                    <span class="badge me-2 mb-2" style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080; padding: 6px 10px;">
                                        <i class="bx bx-user" style="color: #ffffff;"></i> {{ $user->name }}
                                    </span>
                                @empty
                                    <p style="color: #000000;">Ningún usuario tiene este rol</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

