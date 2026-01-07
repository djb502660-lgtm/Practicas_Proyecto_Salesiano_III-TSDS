@extends('layaout.app')

@section('title', 'Perfil del Psicólogo')

@section('content')
    <style>
        /* Estilos personalizados para ajustar al diseño solicitado */
        .profile-card {
            background-color: #F8F9FA;
            /* Gris muy claro de fondo */
            border-radius: 20px;
            overflow: hidden;
            max-width: 480px;
            /* Ancho tipo móvil */
            margin: 0 auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            color: #333;
            position: relative;
            padding-bottom: 70px;
            /* Espacio para el bottom nav */
            border: 1px solid #e0e0e0;
        }

        .header-section {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .back-button {
            position: absolute;
            left: 20px;
            color: #333;
            font-size: 1.2rem;
            cursor: pointer;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            background-color: #E9ECEF;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: #6C757D;
            font-size: 2.5rem;
        }

        .profile-name {
            font-weight: 600;
            font-size: 1.2rem;
            color: #212529;
            margin-bottom: 0;
        }

        .profile-role {
            color: #6C757D;
            font-size: 0.9rem;
        }

        .menu-item {
            background-color: #FFFFFF;
            border-radius: 12px;
            padding: 15px;
            margin: 15px 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.02);
            cursor: pointer;
            transition: transform 0.2s;
        }

        .menu-item:hover {
            transform: translateY(-2px);
        }

        .menu-icon-box {
            width: 40px;
            height: 40px;
            border: 2px solid #333;
            /* Icono contorneado oscuro como en la imagen */
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #333;
        }

        .menu-icon-box i {
            font-size: 1.3rem;
        }

        .menu-text h6 {
            margin: 0;
            font-weight: 600;
            color: #333;
        }

        .menu-text p {
            margin: 0;
            font-size: 0.8rem;
            color: #6C757D;
        }

        /* Bottom Navigation Bar simulado dentro de la tarjeta */
        .bottom-nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            background-color: #FFFFFF;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
            width: 100%;
            border-top: 1px solid #eee;
        }

        .nav-item-custom {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 0.7rem;
            color: #6C757D;
            cursor: pointer;
        }

        .nav-item-custom.active {
            color: #DC3545;
            /* Rojo solicitado */
            font-weight: 600;
        }

        .nav-item-custom i {
            font-size: 1.5rem;
            margin-bottom: 2px;
        }

        /* Ajuste para iconos rellenos/vacíos si es necesario */
    </style>

    <div class="d-flex justify-content-center py-4" style="background-color: #fff;">
        <div class="profile-card">
            <!-- Header -->
            <div class="header-section">
                <a href="{{ route('home') }}" class="back-button">
                    <i class='bx bx-arrow-back'></i>
                </a>
                <h5 class="mb-0 fw-bold">Perfil del Psicólogo</h5>
            </div>

            <!-- Perfil Info -->
            <div class="text-center mb-4">
                <div class="profile-avatar">
                    @if(isset($usuario->foto) && $usuario->foto)
                        <img src="{{ $usuario->foto }}" alt="Avatar" class="rounded-circle w-100 h-100 object-fit-cover">
                    @else
                        <i class='bx bx-user'></i>
                    @endif
                </div>
                <h4 class="profile-name">{{ $usuario->nombre ?? 'Usuario' }}</h4>
                <span class="profile-role">{{ $usuario->cargo ?? 'Invitado' }}</span>
            </div>

            <!-- Menú Items -->
            <a href="#" class="text-decoration-none">
                <div class="menu-item">
                    <div class="menu-icon-box">
                        <i class='bx bx-id-card'></i>
                    </div>
                    <div class="menu-text">
                        <h6>Datos de Contacto</h6>
                        <p>Información personal y de contacto</p>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="menu-item">
                    <div class="menu-icon-box">
                        <i class='bx bx-briefcase'></i>
                    </div>
                    <div class="menu-text">
                        <h6>Detalles del Puesto</h6>
                        <p>Información profesional y administrativa</p>
                    </div>
                </div>
            </a>

            <a href="#" class="text-decoration-none">
                <div class="menu-item">
                    <div class="menu-icon-box">
                        <i class='bx bx-group'></i>
                    </div>
                    <div class="menu-text">
                        <h6>Módulos a Cargo</h6>
                        <p>Grupos y módulos asignados</p>
                    </div>
                </div>
            </a>

            <!-- Bottom Navigation -->
            <div class="bottom-nav">
                <div class="nav-item-custom">
                    <i class='bx bx-grid-alt'></i>
                    <span>Panel</span>
                </div>
                <div class="nav-item-custom">
                    <i class='bx bx-restaurant'></i>
                    <span>Comedor</span>
                </div>
                <div class="nav-item-custom">
                    <i class='bx bx-brain'></i>
                    <span>Psicología</span>
                </div>
                <div class="nav-item-custom active">
                    <i class='bx bxs-user'></i>
                    <span>Usuario</span>
                </div>
                <div class="nav-item-custom">
                    <i class='bx bx-cog'></i>
                    <span>Ajustes</span>
                </div>
            </div>
        </div>
    </div>
@endsection