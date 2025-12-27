<!doctype html>
<html lang="es" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{asset('assets/')}}" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title') - Proyecto Saleciano Costa Norte</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/img/icono.jpeg')}}" />
    <link rel="apple-touch-icon" href="{{ asset('assets/img/icono.jpeg')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Montserrat:wght@400;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <style>
        :root {
            --brand: #dc3545;
            --brand-strong: #b02a37;
            --brand-soft: rgba(220, 53, 69, 0.12);
            --ink: #151515;
            --ink-soft: #454545;
            --canvas: #f5f2ef;
            --card: #ffffff;
            --shadow: 0 10px 30px rgba(10, 10, 10, 0.08);
            --shadow-soft: 0 6px 18px rgba(10, 10, 10, 0.06);
            --radius: 16px;
        }

        body {
            background: radial-gradient(900px circle at 10% -10%, rgba(220, 53, 69, 0.12), transparent 60%),
                linear-gradient(180deg, #f7f4f1 0%, #f2efec 100%);
            color: var(--ink);
            font-family: "Montserrat", "Public Sans", "Segoe UI", sans-serif;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: "Playfair Display", "Montserrat", "Public Sans", sans-serif;
            letter-spacing: 0.2px;
        }

        .layout-menu {
            background: #ffffff !important;
            border-right: 1px solid rgba(0, 0, 0, 0.06);
            box-shadow: 0 10px 30px rgba(10, 10, 10, 0.04);
            width: 300px;
        }

        .app-brand {
            padding: 1.1rem 1.25rem;
        }

        .app-brand .app-brand-text {
            font-size: 1.05rem;
            text-transform: uppercase;
            letter-spacing: 0.6px;
        }

        .menu-inner .menu-link {
            border-radius: 12px;
            margin: 6px 12px;
            padding: 10px 14px;
            transition: transform 0.2s ease, background-color 0.2s ease;
        }

        .menu-item.active > .menu-link {
            background: var(--brand-soft) !important;
            border: 1px solid rgba(220, 53, 69, 0.2);
        }

        .menu-link:hover {
            transform: translateX(4px);
        }

        .layout-page {
            margin-left: 300px;
        }

        .layout-menu-collapsed .layout-page {
            margin-left: 0;
        }

        .layout-navbar {
            border-radius: 18px;
            box-shadow: var(--shadow-soft);
        }

        .content-wrapper {
            position: relative;
        }

        .content-wrapper::before {
            content: "";
            position: absolute;
            inset: 18px;
            border-radius: 28px;
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.08), transparent 55%);
            z-index: 0;
        }

        .container-xxl {
            position: relative;
            z-index: 1;
            background: transparent !important;
        }

        .card {
            background: var(--card) !important;
            border: 1px solid rgba(0, 0, 0, 0.08) !important;
            border-radius: var(--radius) !important;
            box-shadow: var(--shadow);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 34px rgba(10, 10, 10, 0.12);
        }

        .card-header {
            background: linear-gradient(135deg, rgba(220, 53, 69, 0.08), rgba(255, 255, 255, 0.9)) !important;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06) !important;
            border-radius: calc(var(--radius) - 2px) calc(var(--radius) - 2px) 0 0 !important;
        }

        .btn {
            border-radius: 999px;
            font-weight: 600;
            letter-spacing: 0.2px;
            box-shadow: 0 6px 14px rgba(220, 53, 69, 0.2);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 18px rgba(220, 53, 69, 0.25);
        }

        .form-control,
        .form-select,
        textarea {
            border-radius: 12px !important;
            border-color: rgba(0, 0, 0, 0.15) !important;
        }

        .form-control:focus,
        .form-select:focus,
        textarea:focus {
            border-color: var(--brand) !important;
            box-shadow: 0 0 0 0.18rem rgba(220, 53, 69, 0.18) !important;
        }

        .table {
            border-radius: 14px;
            overflow: hidden;
        }

        .badge {
            border-radius: 999px;
            padding: 6px 12px;
            font-weight: 600;
        }

        .dashboard-grid {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        }

        .dash-card {
            position: relative;
            overflow: hidden;
            padding: 22px;
            min-height: 190px;
        }

        .dash-card::after {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(120px circle at 85% -10%, rgba(220, 53, 69, 0.18), transparent 60%);
            opacity: 0.8;
            pointer-events: none;
        }

        .dash-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: rgba(220, 53, 69, 0.12);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
        }

        .dash-icon i {
            font-size: 1.8rem;
            color: var(--brand);
        }

        .dash-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .dash-desc {
            color: var(--ink-soft);
            margin-bottom: 16px;
        }

        .dash-action {
            position: relative;
            z-index: 1;
            background: var(--brand);
            color: #fff;
        }

        .dash-action:hover {
            background: var(--brand-strong);
            color: #fff;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .panel-badge {
            background: rgba(220, 53, 69, 0.12);
            color: var(--brand-strong);
            border-radius: 999px;
            padding: 6px 14px;
            font-weight: 600;
        }

        .welcome-card {
            background: linear-gradient(120deg, #ffffff, rgba(220, 53, 69, 0.08)) !important;
        }

        @keyframes riseIn {
            from {
                opacity: 0;
                transform: translateY(12px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card,
        .alert {
            animation: riseIn 0.35s ease both;
        }
    </style>
    <script src="{{ asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{ asset('assets/js/config.js')}}"></script>
</head>

<body class="{{ request()->routeIs('home') && auth()->guest() ? 'guest-landing-body' : '' }}">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="{{ route('home') }}" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('assets/img/icono.jpeg') }}" alt="Proyecto Saleciano" style="width: 32px; height: 32px; margin-right: 8px;" />
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2" style="color: #000000;">Proyecto Saleciano</span>
                    </a>
                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle" style="color: #dc3545;"></i>
                            <div data-i18n="Inicio" style="color: #000000;">Inicio</div>
                        </a>
                    </li>

                    @auth
                    <!-- Usuarios -->
                    <li class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.users.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user" style="color: #dc3545;"></i>
                            <div data-i18n="Usuarios" style="color: #000000;">Usuarios</div>
                        </a>
                    </li>

                    <!-- Roles -->
                    <li class="menu-item {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.roles.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-shield" style="color: #dc3545;"></i>
                            <div data-i18n="Roles" style="color: #000000;">Roles</div>
                        </a>
                    </li>

                    <!-- Afiliados -->
                    <li class="menu-item {{ request()->routeIs('admin.afiliados.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.afiliados.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-group" style="color: #dc3545;"></i>
                            <div data-i18n="Afiliados" style="color: #000000;">Afiliados</div>
                        </a>
                    </li>

                    <!-- Mediciones -->
                    <li class="menu-item {{ request()->routeIs('admin.mediciones.*') ? 'active' : '' }}">
                        <a href="{{ route('admin.mediciones.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-line-chart" style="color: #dc3545;"></i>
                            <div data-i18n="Historial de mediciones" style="color: #000000;">Historial de mediciones</div>
                        </a>
                    </li>

                    @if(auth()->user()->hasAnyPermission(['psicologia.view', 'psicologia.create', 'psicologia.edit', 'psicologia.delete']))
                        <!-- Psicologia -->
                        <li class="menu-item {{ request()->routeIs('admin.psicologia.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.psicologia.index') }}" class="menu-link">
                                <i class="menu-icon tf-icons bx bx-brain" style="color: #dc3545;"></i>
                                <div data-i18n="Psicologia" style="color: #000000;">Psicologia</div>
                            </a>
                        </li>
                    @endif

                    @endauth
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->
                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar" style="background-color: #ffffff; border-bottom: 1px solid #808080;">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm" style="color: #dc3545;"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            @auth
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" style="color: #000000;">
                                    <div class="avatar avatar-online">
                                        <i class="bx bx-user-circle" style="font-size: 2rem; color: #dc3545;"></i>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" style="background-color: #ffffff; border: 1px solid #808080;">
                                    <li>
                                        <a class="dropdown-item" href="#" style="color: #000000;">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <i class="bx bx-user-circle" style="font-size: 2rem; color: #dc3545;"></i>
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block" style="color: #000000;">{{ Auth::user()->name }}</span>
                                                    <small class="text-muted" style="color: #000000;">{{ Auth::user()->email }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider" style="border-color: #808080;"></div>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="dropdown-item" style="color: #000000; background: none; border: none; width: 100%; text-align: left;">
                                                <i class="bx bx-power-off me-2" style="color: #dc3545;"></i>
                                                <span class="align-middle">Cerrar Sesión</span>
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                            @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color: #000000;">
                                    <i class="bx bx-log-in me-2" style="color: #dc3545;"></i> Iniciar Sesión
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="color: #000000;">
                                    <i class="bx bx-user-plus me-2" style="color: #dc3545;"></i> Registrarse
                                </a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </nav>
                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-xxl flex-grow-1 container-p-y" style="background-color: #ffffff;">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #d4edda; border: 1px solid #808080; color: #000000;">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color: #f8d7da; border: 1px solid #808080; color: #000000;">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @yield('content')
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme" style="background-color: #ffffff; border-top: 1px solid #808080;">
                        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0" style="color: #000000;">
                                © {{ date('Y') }}, Proyecto Saleciano Costa Norte
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Core JS -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
</body>
</html>
