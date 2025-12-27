<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Proyecto Salesiano Costa Norte</title>
    <link rel="icon" type="image/jpeg" href="{{ asset('assets/img/icono.jpeg')}}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css')}}" />
    <script src="{{ asset('assets/vendor/js/helpers.js')}}"></script>
    <script src="{{ asset('assets/js/config.js')}}"></script>
</head>
<body class="login-page">
    <style>
        :root {
            --login-red: #d8262d;
            --login-red-dark: #b91e24;
            --login-gray: #6a6a6a;
            --login-light: #f8f8f8;
            --login-border: #f0c7c7;
        }

        .login-page {
            min-height: 100vh;
            background: radial-gradient(circle at top, rgba(216, 38, 45, 0.08), transparent 60%),
                linear-gradient(180deg, #f6efef 0%, #ffffff 60%);
            font-family: "Poppins", sans-serif;
        }

        .login-shell {
            padding: 56px 16px 72px;
        }

        .login-card {
            background-color: #ffffff;
            border: 1px solid var(--login-border);
            border-radius: 36px;
            padding: 36px 40px 32px;
            box-shadow: 0 26px 60px rgba(15, 15, 15, 0.12);
            max-width: 980px;
            margin: 0 auto;
        }

        .login-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 28px;
            text-align: center;
        }

        .login-logo {
            width: 110px;
            height: 110px;
            border-radius: 999px;
            object-fit: cover;
            box-shadow: 0 12px 24px rgba(216, 38, 45, 0.22);
        }

        .login-headline {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
            text-align: center;
        }

        .login-brand {
            font-size: 0.95rem;
            font-weight: 600;
            color: #111111;
            text-transform: uppercase;
            letter-spacing: 0.06em;
        }

        .login-heading {
            font-size: 1.4rem;
            font-weight: 700;
            color: #111111;
        }

        .login-caption {
            color: var(--login-gray);
            font-size: 0.95rem;
            margin-left: 0;
        }

        .login-label {
            font-weight: 700;
            color: #2b2b2b;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-size: 0.7rem;
        }

        .login-input {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 14px;
            padding: 12px 16px;
        }

        .login-input:focus {
            border-color: var(--login-red);
            box-shadow: 0 0 0 0.15rem rgba(216, 38, 45, 0.18);
        }

        .login-addon {
            background: #ffffff;
            border: 1px solid #e0e0e0;
            border-left: 0;
            border-radius: 0 14px 14px 0;
        }

        .login-btn {
            background: var(--login-red);
            border: none;
            color: #ffffff;
            border-radius: 16px;
            padding: 14px 16px;
            font-weight: 600;
            letter-spacing: 0.2px;
            box-shadow: 0 12px 24px rgba(216, 38, 45, 0.25);
        }

        .login-btn:hover {
            background: var(--login-red-dark);
            color: #ffffff;
        }

        .login-register {
            color: #2b2b2b;
            margin-top: 6px;
        }

        .login-register a {
            color: var(--login-red);
            font-weight: 600;
            text-decoration: none;
        }

        .login-register a:hover {
            color: var(--login-red-dark);
            text-decoration: underline;
        }
    </style>
    <div class="container-xxl login-shell">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <div class="card login-card">
                    <div class="card-body">
                        <div class="login-header">
                            <img src="{{ asset('assets/img/icono.jpeg') }}" alt="Proyecto Salesiano" class="login-logo" />
                            <div class="login-headline">
                                <span class="login-brand">Proyecto Salesiano Costa Norte</span>
                                <span class="login-heading">Crear cuenta</span>
                                <span class="login-caption">Completa los datos para registrarte</span>
                            </div>
                        </div>

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

                        <form id="formAuthentication" class="mb-3" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label login-label">Introduce tu nombre</label>
                                <input
                                    type="text"
                                    class="form-control login-input @error('name') is-invalid @enderror"
                                    id="name"
                                    name="name"
                                    placeholder="Tu nombre completo"
                                    value="{{ old('name') }}"
                                />
                                @error('name')
                                    <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label login-label">Introduce tu correo electrónico</label>
                                <input
                                    type="email"
                                    class="form-control login-input @error('email') is-invalid @enderror"
                                    id="email"
                                    name="email"
                                    placeholder="correo@correo.com"
                                    value="{{ old('email') }}"
                                />
                                @error('email')
                                    <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label login-label">Selecciona tu rol</label>
                                <select
                                    id="role"
                                    name="role"
                                    class="form-select login-input @error('role') is-invalid @enderror"
                                >
                                    <option value="usuario" {{ old('role', 'usuario') === 'usuario' ? 'selected' : '' }}>Usuario</option>
                                    <option value="psicologo" {{ old('role') === 'psicologo' ? 'selected' : '' }}>Psicologo</option>
                                </select>
                                @error('role')
                                    <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label login-label" for="password">Ingresa tu contraseña</label>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control login-input @error('password') is-invalid @enderror"
                                        name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password"
                                    />
                                    <span class="input-group-text cursor-pointer login-addon"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback" style="color: #dc3545;">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label login-label" for="password_confirmation">Confirma tu contraseña</label>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="password_confirmation"
                                        class="form-control login-input"
                                        name="password_confirmation"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password_confirmation"
                                    />
                                    <span class="input-group-text cursor-pointer login-addon"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn login-btn d-grid w-100" type="submit">
                                    <i class="bx bx-user-plus" style="color: #ffffff;"></i> Registrarse
                                </button>
                            </div>
                        </form>

                        <p class="text-center login-register">
                            <span>¿Ya tienes una cuenta?</span>
                            <a href="{{ route('login') }}">Inicia sesión</a>
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
