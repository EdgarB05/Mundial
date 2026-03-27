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
    @endsection
    
</body>
</html>
