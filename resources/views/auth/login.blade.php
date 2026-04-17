<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<body>
    @extends('layouts.auth')
    @section('content')
    
    <div class="auth-card">
        <div class="auth-hero">
            <div>
                <h1 class="auth-hero-title">Bienvenido de Nuevo</h1>
                <p class="auth-hero-text">Accede a tu cuenta del Mundial 2026</p>
            </div>
        </div>

        <div class="auth-body">
            <form action="{{ route('acceso.store') }}" method="POST">
                @csrf

                @include('partials.alerts')

                <div class="mb-3">
                    <label class="auth-label">Correo electrónico</label>
                    <div class="input-shell">
                        <i class="fa-solid fa-envelope input-icon"></i>
                        <input type="email" name="email" placeholder="correo@ejemplo.com" class="form-control" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="auth-label">Contraseña</label>
                    <div class="input-shell password-shell">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" name="password" id="login_password" placeholder="••••••••" class="form-control" required>
                        <i class="fa-solid fa-eye toggle-password" data-target="login_password"></i>
                    </div>
                </div>

                <button type="submit" class="auth-submit">
                    Iniciar Sesión <i class="fa-solid fa-arrow-right ms-2"></i>
                </button>

                <div class="auth-links">
                    ¿No tienes cuenta?
                    <a href="{{ route('registro') }}">Crear una cuenta</a>
                </div>
            </form>
        </div>

        <div class="auth-bottom">
            <i class="fa-solid fa-shield-halved"></i>
            <i class="fa-solid fa-shield-heart"></i>
            <i class="fa-solid fa-globe"></i>
        </div>
    </div>
    @endsection
</body>
</html>
