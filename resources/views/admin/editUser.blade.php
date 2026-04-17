<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    @extends('layouts.user-edit')
    @section('content')
    <div class="user-edit-page">
        <div class="container">
            <div class="user-edit-wrapper">
                <div class="user-edit-card">
                    <div class="user-edit-header">
                        <span class="user-edit-badge">Editar usuario</span>
                        <h1 class="user-edit-title">{{ $user->name }}</h1>
                        <p class="user-edit-subtitle">Actualiza los datos de la cuenta y el nivel de acceso del usuario.</p>
                    </div>

                    <div class="user-edit-body">
                        @include('partials.alerts')

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('usuarios.update', $user) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="section-box">
                                <h2 class="section-title">Información de la cuenta</h2>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="field-label">Nombre</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-user input-icon"></i>
                                            <input
                                                type="text"
                                                name="name"
                                                class="form-control"
                                                value="{{ old('name', $user->name) }}"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Correo</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-envelope input-icon"></i>
                                            <input
                                                type="email"
                                                name="email"
                                                class="form-control"
                                                value="{{ old('email', $user->email) }}"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Número de teléfono</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-phone input-icon"></i>
                                            <input
                                                type="text"
                                                name="phone"
                                                class="form-control"
                                                value="{{ old('phone', $user->phone) }}"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Rol</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-user-shield input-icon"></i>
                                            <select name="role" class="form-select" required>
                                                <option value="">Selecciona un tipo de usuario</option>
                                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                                                <option value="cliente" {{ old('role', $user->role) == 'cliente' ? 'selected' : '' }}>Cliente</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section-box">
                                <h2 class="section-title">Seguridad</h2>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="field-label">Nueva contraseña</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-lock input-icon"></i>
                                            <input
                                                type="password"
                                                name="password"
                                                placeholder="Déjala vacía si no quieres cambiarla"
                                                class="form-control"
                                            >
                                        </div>
                                        <div class="password-note">Solo llena este campo si deseas actualizar la contraseña.</div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Confirmar nueva contraseña</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-lock input-icon"></i>
                                            <input
                                                type="password"
                                                name="password_confirmation"
                                                class="form-control"
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="action-row">
                                <a href="{{ route('admin-dashboard') }}" class="btn btn-outline-secondary btn-back">
                                    Volver
                                </a>

                                <button type="submit" class="btn btn-save">
                                    <i class="fa-solid fa-floppy-disk me-2"></i>
                                    Actualizar usuario
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    
</body>
</html>