<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Proyecto Salesiano Costa Norte</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/img/icono.jpeg')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css')}}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css')}}" />
    <script src="{{ asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{ asset('assets/js/config.js')}}"></script>
</head>

<body style="background-color: #ffffff;">
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card" style="background-color: #ffffff; border: 1px solid #808080;">
                    <div class="card-body" style="background-color: #ffffff;">
                        <div class="app-brand justify-content-center mb-4">
                            <div class="text-center mb-3">
                                <img src="{{ asset('assets/img/icono.jpeg') }}" alt="Proyecto Salesiano"
                                    style="width: 80px; height: 80px; margin-bottom: 1rem;" />
                            </div>
                            <h2 style="color: #000000; text-align: center; margin-bottom: 2rem;">Proyecto Salesiano
                                Costa Norte</h2>
                        </div>

                        <h4 class="mb-2" style="color: #000000; text-align: center;">Crear Cuenta</h4>
                        <p class="mb-4" style="color: #000000; text-align: center;">Completa los datos para registrarte
                        </p>

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert"
                                style="background-color: #f8d7da; border: 1px solid #808080; color: #000000;">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label" style="color: #000000;">Nombre</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                    name="name" placeholder="Ingresa tu nombre" value="{{ old('name') }}"
                                    style="border: 1px solid #808080; color: #000000;" />
                                @error('name')
                                    <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label" style="color: #000000;">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Ingresa tu email" value="{{ old('email') }}"
                                    style="border: 1px solid #808080; color: #000000;" />
                                @error('email')
                                    <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password" style="color: #000000;">Contraseña</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password"
                                        style="border: 1px solid #808080; color: #000000;" />
                                    <span class="input-group-text cursor-pointer"
                                        style="background-color: #ffffff; border: 1px solid #808080; color: #000000;"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password_confirmation" style="color: #000000;">Confirmar
                                    Contraseña</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password_confirmation" class="form-control"
                                        name="password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password_confirmation"
                                        style="border: 1px solid #808080; color: #000000;" />
                                    <span class="input-group-text cursor-pointer"
                                        style="background-color: #ffffff; border: 1px solid #808080; color: #000000;"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit"
                                    style="background-color: #dc3545; color: #ffffff; border: none;">
                                    <i class="bx bx-user-plus" style="color: #ffffff;"></i> Registrarse
                                </button>
                            </div>
                        </form>

                        <p class="text-center" style="color: #000000;">
                            <span>¿Ya tienes una cuenta?</span>
                            <a href="{{ route('login') }}" style="color: #dc3545;">
                                <span>Inicia Sesión</span>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
</body>

</html>