@extends('layaout.app')

@section('title', 'Inicio')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="panel-header">
                        <h4 class="mb-0">
                            <i class="bx bx-home" style="color: #dc3545;"></i> Panel de Control
                        </h4>
                        <span class="panel-badge">Acceso rapido</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="dashboard-grid">
                        <div class="card dash-card">
                            <div class="dash-icon">
                                <i class="bx bx-user"></i>
                            </div>
                            <div class="dash-title">Usuarios</div>
                            <div class="dash-desc">Gestiona los usuarios del sistema</div>
                            <a href="{{ route('admin.users.index') }}" class="btn dash-action">Ver Usuarios</a>
                        </div>
                        <div class="card dash-card">
                            <div class="dash-icon">
                                <i class="bx bx-shield"></i>
                            </div>
                            <div class="dash-title">Roles</div>
                            <div class="dash-desc">Administra los roles del sistema</div>
                            <a href="{{ route('admin.roles.index') }}" class="btn dash-action">Ver Roles</a>
                        </div>
                        <div class="card dash-card">
                            <div class="dash-icon">
                                <i class="bx bx-check-circle"></i>
                            </div>
                            <div class="dash-title">Permisos</div>
                            <div class="dash-desc">Gestiona los permisos del sistema</div>
                            <a href="{{ route('admin.permissions.index') }}" class="btn dash-action">Ver Permisos</a>
                        </div>
                        <div class="card dash-card">
                            <div class="dash-icon">
                                <i class="bx bx-group"></i>
                            </div>
                            <div class="dash-title">Afiliados</div>
                            <div class="dash-desc">Gestiona las fichas socioeconomicas</div>
                            <a href="{{ route('admin.afiliados.index') }}" class="btn dash-action">Ver Afiliados</a>
                        </div>
                        <div class="card dash-card">
                            <div class="dash-icon">
                                <i class="bx bx-line-chart"></i>
                            </div>
                            <div class="dash-title">Historial de mediciones</div>
                            <div class="dash-desc">Registra peso, talla e IMC</div>
                            <a href="{{ route('admin.mediciones.index') }}" class="btn dash-action">Ver Historial</a>
                        </div>
                        <div class="card dash-card">
                            <div class="dash-icon">
                                <i class="bx bx-brain"></i>
                            </div>
                            <div class="dash-title">Psicologia</div>
                            <div class="dash-desc">Evaluaciones y seguimientos</div>
                            <a href="{{ route('admin.psicologia.index') }}" class="btn dash-action">Ver Psicologia</a>
                        </div>
                    </div>

                    @auth
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card welcome-card">
                                    <div class="card-body">
                                        <h5>Bienvenido, {{ Auth::user()->name }}</h5>
                                        <p>Email: {{ Auth::user()->email }}</p>
                                        @if(Auth::user()->roles->count() > 0)
                                            <p>
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
