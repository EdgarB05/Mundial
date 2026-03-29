<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <h1>REGISTRO DE USUARIOS</h1>

        <form action="{{ route('registro.store') }}" method="POST">
            @csrf

            @include('partials.alerts')

            <input type="text" name="name" placeholder="Nombre" class="form-control" value="{{ old('name') }}" required>
            <br>
            <input type="email" name="email" placeholder="Correo" class="form-control" value="{{ old('email') }}" required>
            <br>
            <input type="text" name="phone" placeholder="Teléfono" class="form-control" value="{{ old('phone') }}" required>
            <br>

            <select name="role" class="form-control" required>
                @if(auth()->user()?->role === 'admin')
                    <option value="">Selecciona un tipo de usuario</option>
                    <option value="empleado">Empleado</option>
                    <option value="admin">Administrador</option>
                @endif
                <option value="cliente">Cliente</option>
            </select>
            <br>

            <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
            <br>
            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" class="form-control" required>
            <br>

            <button type="submit" class="btn btn-success">Guardar</button>

            <a href="{{ route('acceso.store') }}" class="btn btn-secondary">
                Inicia sesión
            </a>
        </form>
    @endsection
</body>
</html>
