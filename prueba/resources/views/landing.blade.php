@extends('layaout.app')

@section('title', 'Bienvenido')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-12 text-center py-5">
                <div class="mb-5 animate__animated animate__fadeInDown">
                    <img src="{{ asset('assets/img/icono.jpeg') }}" alt="Proyecto Salesiano"
                        style="width: 150px; height: 150px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
                </div>

                <h1 class="display-4 fw-bold mb-4 animate__animated animate__fadeInUp" style="color: #2c3e50;">
                    Proyecto Salesiano Costa Norte
                </h1>

                <p class="lead mb-5 mx-auto animate__animated animate__fadeInUp"
                    style="max-width: 700px; color: #576574; font-size: 1.25rem;">
                    Transformando vidas a través de la educación y el acompañamiento. Gestiona procesos de destinatarios,
                    mediciones y seguimiento integral de manera eficiente y segura.
                </p>

                <div class="d-flex justify-content-center gap-3 animate__animated animate__zoomIn">
                    <a href="{{ route('login') }}" class="btn btn-lg px-4 py-3"
                        style="background-color: #dc3545; color: #ffffff; border: none; font-weight: 600; min-width: 200px;">
                        <i class="ri-login-box-line me-2"></i> Iniciar Sesión
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-lg px-4 py-3"
                        style="background-color: #ffffff; color: #dc3545; border: 2px solid #dc3545; font-weight: 600; min-width: 200px;">
                        <i class="ri-user-add-line me-2"></i> Registrarse
                    </a>
                </div>

                <div class="row mt-5 pt-5 justify-content-center">
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 border-0 shadow-sm p-4 text-center"
                            style="border-radius: 24px; background: #f8f9fa;">
                            <i class="ri-team-line mb-3" style="font-size: 2.5rem; color: #dc3545;"></i>
                            <h5 class="fw-bold">Gestión de Destinatarios</h5>
                            <p class="text-muted small">Control detallado de fichas socioeconómicas.</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 border-0 shadow-sm p-4 text-center"
                            style="border-radius: 24px; background: #f8f9fa;">
                            <i class="ri-bar-chart-2-line mb-3" style="font-size: 2.5rem; color: #dc3545;"></i>
                            <h5 class="fw-bold">Seguimiento de Salud</h5>
                            <p class="text-muted small">Monitoreo de peso, talla e IMC progresivo.</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 border-0 shadow-sm p-4 text-center"
                            style="border-radius: 24px; background: #f8f9fa;">
                            <i class="ri-mental-health-line mb-3" style="font-size: 2.5rem; color: #dc3545;"></i>
                            <h5 class="fw-bold">Acompañamiento</h5>
                            <p class="text-muted small">Atención psicológica y educativa personalizada.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @import url('https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css');

        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
        }

        .btn-lg:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }
    </style>
@endsection