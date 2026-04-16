<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <h1>Panel administrador</h1>
        <p>Bienvenido, {{ auth()->user()->name }}. Esta sección es exclusiva para usuarios con rol <strong>admin</strong>.</p>

        @if(auth()->user()->role === 'admin')
            <a href="{{ route('registro') }}" class="btn btn-secondary mb-3 me-3">
                Registrar un nuevo usuario
            </a>
        @endif

        <a href="{{ route('voluntariado.index') }}" class="btn btn-primary mb-3 me-3">
            Gestionar Voluntariado y Staff
        </a>

        <a href="{{ route('boletos.index') }}" class="btn btn-secondary mb-3 me-3">
            Regresar
        </a>

        @include('partials.alerts')

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Telefono</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $user) }}" class="btn btn-warning">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            
                        </td> 
                        <td>
                            <form action="{{ route('usuarios.destroy', $user) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" onclick="return confirm('¿Eliminar el registro?')">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>                 
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    @endsection
    
</body>
</html>
