<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    
    <h1 class="mb-4">Editar usuario</h1>

    <form action="{{ route('usuarios.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            @include('partials.alerts')

            <div class="mb-3">
                <label class="form-label">Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Correo</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Número de teléfono</label>
                <input type="text" name="phone" placeholder="Teléfono" class="form-control" value="{{ old('phone', $user->phone) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Rol</label>
                <select name="role" class="form-control" required>
                    <option value="">Selecciona un tipo de usuario</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="empleado" {{ old('role', $user->role) == 'empleado' ? 'selected' : '' }}>Empleado</option>
                    <option value="cliente" {{ old('roel', $user->role) == 'cliente' ? 'selected' : '' }}>Cliente</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Nueva contraseña</label>
                <input type="password" name="password" placeholder="Déjala vacía si no quieres cambiarla."  class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Confirmar nueva contraseña</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Actualizar usuario</button>

    <div class="d-flex justify-content-end">
        <a href="{{ route('admin-dashboard') }}" class="btn btn-danger">
            Volver
        </a>
    </div>
    @endsection
    
</body>
</html>