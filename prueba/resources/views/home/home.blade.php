@extends('layaout.app')

@section('title', 'Inicio')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <h4 class="mb-0" style="color: #000000;">
                        <i class="bx bx-home" style="color: #dc3545;"></i> Panel de Control
                    </h4>
                </div>
                <div class="card-body" style="background-color: #ffffff;">
                    <div class="row">
                        <div class="col-md-4 mb-4">
                            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                                <div class="card-body text-center">
                                    <i class="bx bx-user" style="font-size: 3rem; color: #dc3545;"></i>
                                    <h5 class="mt-3" style="color: #000000;">Usuarios</h5>
                                    <p class="text-muted" style="color: #000000;">Gestiona los usuarios del sistema</p>
                                    <a href="{{ route('admin.users.index') }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                        <i class="bx bx-right-arrow-alt" style="color: #ffffff;"></i> Ver Usuarios
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                                <div class="card-body text-center">
                                    <i class="bx bx-shield" style="font-size: 3rem; color: #dc3545;"></i>
                                    <h5 class="mt-3" style="color: #000000;">Roles</h5>
                                    <p class="text-muted" style="color: #000000;">Administra los roles del sistema</p>
                                    <a href="{{ route('admin.roles.index') }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                        <i class="bx bx-right-arrow-alt" style="color: #ffffff;"></i> Ver Roles
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                                <div class="card-body text-center">
                                    <i class="bx bx-check-circle" style="font-size: 3rem; color: #dc3545;"></i>
                                    <h5 class="mt-3" style="color: #000000;">Permisos</h5>
                                    <p class="text-muted" style="color: #000000;">Gestiona los permisos del sistema</p>
                                    <a href="{{ route('admin.permissions.index') }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                        <i class="bx bx-right-arrow-alt" style="color: #ffffff;"></i> Ver Permisos
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                                <div class="card-body text-center">
                                    <i class="bx bx-group" style="font-size: 3rem; color: #dc3545;"></i>
                                    <h5 class="mt-3" style="color: #000000;">Afiliados</h5>
                                    <p class="text-muted" style="color: #000000;">Gestiona las fichas socioeconómicas</p>
                                    <a href="{{ route('admin.afiliados.index') }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                        <i class="bx bx-right-arrow-alt" style="color: #ffffff;"></i> Ver Afiliados
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                                <div class="card-body text-center">
                                    <i class="bx bx-line-chart" style="font-size: 3rem; color: #dc3545;"></i>
                                    <h5 class="mt-3" style="color: #000000;">Mediciones</h5>
                                    <p class="text-muted" style="color: #000000;">Registra peso, talla e IMC</p>
                                    <a href="{{ route('admin.mediciones.index') }}" class="btn" style="background-color: #dc3545; color: #ffffff; border: none;">
                                        <i class="bx bx-right-arrow-alt" style="color: #ffffff;"></i> Ver Mediciones
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @auth
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card" style="background-color: #f8f9fa; border: 1px solid #808080;">
                                    <div class="card-body">
                                        <h5 style="color: #000000;">Bienvenido, {{ Auth::user()->name }}</h5>
                                        <p style="color: #000000;">Email: {{ Auth::user()->email }}</p>
                                        @if(Auth::user()->roles->count() > 0)
                                            <p style="color: #000000;">
                                                Roles: 
                                                @foreach(Auth::user()->roles as $role)
                                                    <span class="badge" style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">{{ $role->name }}</span>
                                                @endforeach
                                            </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
