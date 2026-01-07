@extends('layaout.app')

@section('title', 'Inicio')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                    <div class="card-header" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                        <h4 class="mb-0" style="color: #000000;">
                            <i class="ri-dashboard-fill" style="color: #dc3545;"></i> Panel de Control
                        </h4>
                    </div>
                    <div class="card-body" style="background-color: #ffffff;">
                        <div class="row">
                            <div class="col-md-4 mb-4">
                                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="ri-user-settings-fill"
                                                style="font-size: 3rem; color: #dc3545; background: rgba(220, 53, 69, 0.1); padding: 20px; border-radius: 16px;"></i>
                                        </div>
                                        <h5 class="mt-3" style="color: #000000;">Usuarios</h5>
                                        <p class="h3 font-weight-bold" style="color: #dc3545;">{{ $stats['users'] }}</p>
                                        <p class="text-muted" style="color: #000000;">Gestiona los usuarios del sistema</p>
                                        <a href="{{ route('admin.users.index') }}" class="btn"
                                            style="background-color: #dc3545; color: #ffffff; border: none;">
                                            <i class="ri-arrow-right-line" style="color: #ffffff;"></i> Ver Usuarios
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="ri-team-fill"
                                                style="font-size: 3rem; color: #dc3545; background: rgba(220, 53, 69, 0.1); padding: 20px; border-radius: 16px;"></i>
                                        </div>
                                        <h5 class="mt-3" style="color: #000000;">Destinatarios</h5>
                                        <p class="h3 font-weight-bold" style="color: #dc3545;">{{ $stats['destinatarios'] }}
                                        </p>
                                        <p class="text-muted" style="color: #000000;">Gestiona las fichas socioeconómicas
                                        </p>
                                        <a href="{{ route('admin.destinatarios.index') }}" class="btn"
                                            style="background-color: #dc3545; color: #ffffff; border: none;">
                                            <i class="ri-arrow-right-line" style="color: #ffffff;"></i> Ver Destinatarios
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="ri-pulse-fill"
                                                style="font-size: 3rem; color: #dc3545; background: rgba(220, 53, 69, 0.1); padding: 20px; border-radius: 16px;"></i>
                                        </div>
                                        <h5 class="mt-3" style="color: #000000;">Mediciones</h5>
                                        <p class="h3 font-weight-bold" style="color: #dc3545;">{{ $stats['mediciones'] }}
                                        </p>
                                        <p class="text-muted" style="color: #000000;">Registra peso, talla e IMC</p>
                                        <a href="{{ route('admin.mediciones.index') }}" class="btn"
                                            style="background-color: #dc3545; color: #ffffff; border: none;">
                                            <i class="ri-arrow-right-line" style="color: #ffffff;"></i> Ver Mediciones
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="ri-mental-health-fill"
                                                style="font-size: 3rem; color: #dc3545; background: rgba(220, 53, 69, 0.1); padding: 20px; border-radius: 16px;"></i>
                                        </div>
                                        <h5 class="mt-3" style="color: #000000;">Psicología</h5>
                                        <p class="h3 font-weight-bold" style="color: #dc3545;">{{ $stats['psicologia'] }}
                                        </p>
                                        <p class="text-muted" style="color: #000000;">Seguimiento psicológico</p>
                                        <a href="{{ route('admin.psicologia.index') }}" class="btn"
                                            style="background-color: #dc3545; color: #ffffff; border: none;">
                                            <i class="ri-arrow-right-line" style="color: #ffffff;"></i> Ver Psicología
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 mb-4">
                                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                                    <div class="card-body text-center">
                                        <div class="mb-3">
                                            <i class="ri-shield-keyhole-fill"
                                                style="font-size: 3rem; color: #dc3545; background: rgba(220, 53, 69, 0.1); padding: 20px; border-radius: 16px;"></i>
                                        </div>
                                        <h5 class="mt-3" style="color: #000000;">Roles y Permisos</h5>
                                        <p class="text-muted" style="color: #000000;">Seguridad del sistema</p>
                                        <div class="btn-group">
                                            <a href="{{ route('admin.roles.index') }}" class="btn btn-sm"
                                                style="background-color: #dc3545; color: #ffffff; border: none; padding: 0.5rem 1rem;">
                                                <i class="ri-shield-user-line me-1"></i> Roles
                                            </a>
                                            <a href="{{ route('admin.permissions.index') }}" class="btn btn-sm"
                                                style="background-color: #808080; color: #ffffff; border: none; padding: 0.5rem 1rem;">
                                                <i class="ri-lock-password-line me-1"></i> Permisos
                                            </a>
                                        </div>
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
                                                        <span class="badge"
                                                            style="background-color: #dc3545; color: #ffffff; border: 1px solid #808080;">{{ $role->name }}</span>
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