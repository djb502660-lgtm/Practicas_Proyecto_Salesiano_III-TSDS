<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Proyecto Saleciano Costa Norte</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/img/icono.jpeg')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
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
                                <img src="{{ asset('assets/img/icono.jpeg') }}" alt="Proyecto Saleciano" style="width: 80px; height: 80px; margin-bottom: 1rem;" />
                            </div>
                            <h2 style="color: #000000; text-align: center; margin-bottom: 2rem;">Proyecto Saleciano Costa Norte</h2>
                        </div>

                        <h4 class="mb-2" style="color: #000000; text-align: center;">Bienvenido</h4>
                        <p class="mb-4" style="color: #000000; text-align: center;">Por favor inicia sesión en tu cuenta</p>

                        @if($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="background-color: #f8d7da; border: 1px solid #808080; color: #000000;">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label" style="color: #000000;">Email</label>
                                <input
                                    type="text"
                                    class="form-control @error('email') is-invalid @enderror"
                                    id="email"
                                    name="email"
                                    placeholder="Ingresa tu email"
                                    autofocus
                                    value="{{ old('email') }}"
                                    style="border: 1px solid #808080; color: #000000;"
                                />
                                @error('email')
                                    <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password" style="color: #000000;">Contraseña</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password"
                                        style="border: 1px solid #808080; color: #000000;"
                                    />
                                    <span class="input-group-text cursor-pointer" style="background-color: #ffffff; border: 1px solid #808080; color: #000000;"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember" style="border: 1px solid #808080;" />
                                    <label class="form-check-label" for="remember" style="color: #000000;"> Recordarme </label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit" style="background-color: #dc3545; color: #ffffff; border: none;">
                                    <i class="bx bx-log-in" style="color: #ffffff;"></i> Iniciar Sesión
                                </button>
                            </div>
                        </form>

                        <p class="text-center" style="color: #000000;">
                            <span>¿No tienes una cuenta?</span>
                            <a href="{{ route('register') }}" style="color: #dc3545;">
                                <span>Regístrate</span>
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

