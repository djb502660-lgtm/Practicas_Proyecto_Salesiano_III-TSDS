@extends('layaout.app')

@section('title', 'Inicio')

@section('content')
<style>
    .guest-landing-body .layout-menu,
    .guest-landing-body .layout-navbar,
    .guest-landing-body .content-footer {
        display: none !important;
    }

    .guest-landing-body .layout-page {
        margin-left: 0;
    }

    .guest-landing-body .content-wrapper::before {
        inset: 0;
        border-radius: 0;
    }

    .guest-landing-body .container-xxl {
        background-color: transparent !important;
        padding: 32px 16px !important;
    }

    .guest-landing {
        max-width: 980px;
        margin: 0 auto;
        text-align: center;
    }

    .guest-landing-card {
        background: #ffffff;
        border-radius: 40px;
        padding: 48px 28px 40px;
        box-shadow: 0 18px 40px rgba(10, 10, 10, 0.08);
        border: 1px solid rgba(0, 0, 0, 0.06);
    }

    .guest-logo {
        width: 180px;
        height: 180px;
        border-radius: 999px;
        object-fit: cover;
        box-shadow: 0 12px 24px rgba(220, 53, 69, 0.2);
        margin-bottom: 22px;
    }

    .guest-title {
        font-size: clamp(2rem, 4vw, 2.6rem);
        font-weight: 700;
        margin-bottom: 12px;
        color: #111111;
    }

    .guest-tagline {
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #6b6b6b;
        font-weight: 600;
        margin-bottom: 28px;
    }

    .guest-cta {
        background: #b91220;
        border-color: #b91220;
        color: #ffffff;
        padding: 12px 44px;
        font-size: 1rem;
        text-transform: uppercase;
        margin-bottom: 36px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .guest-cta:hover {
        background: #a10e1a;
        border-color: #a10e1a;
        color: #ffffff;
    }

    .guest-features {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 18px;
        margin-bottom: 32px;
    }

    .guest-feature {
        background: #f7f7f7;
        border-radius: 18px;
        padding: 18px 16px;
        border: 1px solid rgba(0, 0, 0, 0.06);
        box-shadow: 0 10px 22px rgba(10, 10, 10, 0.06);
    }

    .guest-feature i {
        font-size: 1.8rem;
        color: #8a8a8a;
        margin-bottom: 10px;
    }

    .guest-feature-title {
        font-weight: 700;
        font-size: 0.95rem;
        text-transform: uppercase;
        margin-bottom: 6px;
        color: #202020;
    }

    .guest-feature-desc {
        font-size: 0.85rem;
        color: #6b6b6b;
        margin: 0;
    }

    .guest-more {
        font-weight: 700;
        color: #1a1a1a;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .guest-link {
        color: #b91220;
        font-weight: 600;
        text-decoration: none;
    }

    .guest-link:hover {
        text-decoration: underline;
    }

    @media (max-width: 600px) {
        .guest-landing-card {
            padding: 40px 20px 32px;
        }

        .guest-logo {
            width: 140px;
            height: 140px;
        }
    }
</style>

@guest
    <div class="guest-landing">
        <div class="guest-landing-card">
            <img class="guest-logo" src="{{ asset('assets/img/icono.jpeg') }}" alt="Proyecto Salesiano Costa Norte">
            <h1 class="guest-title">Proyecto Salesiano<br>Costa Norte</h1>
            <p class="guest-tagline">Con tu apoyo podemos hacer un cambio</p>
            <a href="{{ route('login') }}" class="btn guest-cta">Continuar</a>

            <div class="guest-features">
                <div class="guest-feature">
                    <i class="bx bx-home-alt"></i>
                    <div class="guest-feature-title">Vivienda y hogar</div>
                    <p class="guest-feature-desc">Construimos espacios seguros para familias.</p>
                </div>
                <div class="guest-feature">
                    <i class="bx bx-briefcase-alt-2"></i>
                    <div class="guest-feature-title">Empleo y formacion</div>
                    <p class="guest-feature-desc">Capacitacion para futuro laboral.</p>
                </div>
                <div class="guest-feature">
                    <i class="bx bx-book-open"></i>
                    <div class="guest-feature-title">Educacion integral</div>
                    <p class="guest-feature-desc">Apoyo escolar y valores humanos.</p>
                </div>
            </div>

            <div class="guest-more">Conoce mas sobre la fundacion</div>
            <a class="guest-link" href="https://www.proyectosalesiano.org.ec/" target="_blank" rel="noopener">https://www.proyectosalesiano.org.ec/</a>
        </div>
    </div>
@else
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
                        @if(auth()->user()->hasRole('admin'))
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
                        @endif
                        @if(auth()->user()->hasAnyRole(['admin', 'psicologo']))
                        <div class="card dash-card">
                            <div class="dash-icon">
                                <i class="bx bx-brain"></i>
                            </div>
                            <div class="dash-title">Psicologia</div>
                            <div class="dash-desc">Evaluaciones y seguimientos</div>
                            <a href="{{ route('admin.psicologia.index') }}" class="btn dash-action">Ver Psicologia</a>
                        </div>
                        @endif
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
@endguest
@endsection
