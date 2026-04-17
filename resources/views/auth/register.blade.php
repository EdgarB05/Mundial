<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    @extends('layouts.auth')

    @section('content')
    <div class="auth-card">
        <div class="auth-hero">
            <div>
                <h1 class="auth-hero-title">Únete a la Pasión</h1>
                <p class="auth-hero-text">Sé parte de la historia del Mundial 2026</p>
            </div>
        </div>

        <div class="auth-body">
            <form action="{{ route('registro.store') }}" method="POST">
                @csrf

                @include('partials.alerts')

                <div class="mb-3">
                    <label class="auth-label">Nombre completo</label>
                    <div class="input-shell">
                        <i class="fa-solid fa-user input-icon"></i>
                        <input type="text" name="name" placeholder="Ej. Juan Pérez" class="form-control" value="{{ old('name') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="auth-label">Correo electrónico</label>
                    <div class="input-shell">
                        <i class="fa-solid fa-envelope input-icon"></i>
                        <input
                            type="email" name="email" placeholder="correo@ejemplo.com" class="form-control" value="{{ old('email') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="auth-label">Teléfono</label>
                    <div class="input-shell">
                        <i class="fa-solid fa-phone input-icon"></i>
                        <input type="text" name="phone" placeholder="Ej. 5551234567" class="form-control" value="{{ old('phone') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="auth-label">Tipo de usuario</label>
                    <div class="input-shell">
                        <i class="fa-solid fa-flag input-icon"></i>
                        <select name="role" class="form-select" required>
                            @if(auth()->user()?->role === 'admin')
                                <option value="">Selecciona un tipo de usuario</option>
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrador</option>
                            @endif
                            <option value="cliente" {{ old('role') === 'cliente' ? 'selected' : '' }}>Cliente</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="auth-label">Contraseña</label>
                    <div class="input-shell password-shell">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="form-control" required>
                        <i class="fa-solid fa-eye toggle-password" data-target="password"></i>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="auth-label">Confirmar contraseña</label>
                    <div class="input-shell password-shell">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="form-control" required>
                        <i class="fa-solid fa-eye toggle-password" data-target="password_confirmation"></i>
                    </div>
                </div>

                <button type="submit" class="auth-submit">
                    Crear Cuenta <i class="fa-solid fa-arrow-right ms-2"></i>
                </button>

                <div class="auth-links">
                    ¿Ya tengo cuenta?
                    <a href="{{ route('acceso') }}">Iniciar Sesión</a>
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
