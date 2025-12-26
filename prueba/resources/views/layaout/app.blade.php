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
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <script src="{{ asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{ asset('assets/js/config.js')}}"></script>
</head>

<body>
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
                            <div data-i18n="Mediciones" style="color: #000000;">Mediciones</div>
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
