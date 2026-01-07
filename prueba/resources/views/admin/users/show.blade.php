@extends('layaout.app')

@section('title', 'Ver Usuario')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                    <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0" style="color: #000000;">Detalles del Usuario</h4>
                            <div>
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn"
                                    style="background-color: #dc3545; color: #ffffff; border: none;">
                                    <i class="ri-edit-line" style="color: #ffffff;"></i> Editar
                                </a>
                                <a href="{{ route('admin.users.index') }}" class="btn"
                                    style="background-color: #808080; color: #ffffff; border: 1px solid #808080;">
                                    Volver
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="background-color: #ffffff;">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong style="color: #000000;">ID:</strong>
                                <p style="color: #000000;">{{ $user->id }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong style="color: #000000;">Nombre:</strong>
                                <p style="color: #000000;">{{ $user->name }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <strong style="color: #000000;">Email:</strong>
                                <p style="color: #000000;">{{ $user->email }}</p>
                            </div>
                            <div class="col-md-6">
                                <strong style="color: #000000;">Fecha de Registro:</strong>
                                <p style="color: #000000;">{{ $user->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <strong style="color: #000000;">Roles:</strong>
                                <div class="mt-2">
                                    @forelse($user->roles as $role)
                                        <span class="badge me-2 mb-2"
                                            style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080; padding: 8px 12px;">
                                            <i class="ri-shield-user-line" style="color: #ffffff;"></i> {{ $role->name }}
                                        </span>
                                    @empty
                                        <p style="color: #000000;">Sin roles asignados</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <strong style="color: #000000;">Permisos (a través de roles):</strong>
                                <div class="mt-2">
                                    @php
                                        $userPermissions = $user->permissions();
                                    @endphp
                                    @forelse($userPermissions as $permission)
                                        <span class="badge me-2 mb-2"
                                            style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080; padding: 6px 10px; font-size: 0.85em;">
                                            <i class="ri-checkbox-circle-line" style="color: #ffffff;"></i>
                                            {{ $permission->name }}
                                        </span>
                                    @empty
                                        <p style="color: #000000;">Sin permisos asignados</p>
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