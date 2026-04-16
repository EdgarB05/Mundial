<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntariado</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
        <h1>Voluntariado y Staff</h1>

        @include('partials.alerts')

        <a href="{{ route('voluntariado.create') }}" class="btn btn-primary mb-3">Nuevo registro</a>
        <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary mb-3">Volver</a>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Tipo</th>
                    <th>Idiomas</th>
                    <th>Turno</th>
                    <th>Zona</th>
                    <th>Asistencia</th>
                    <th>Estado</th>
                    <th>QR</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($registros as $registro)
                    <tr>
                        <td>{{ $registro->id }}</td>
                        <td>{{ $registro->nombre }}</td>
                        <td>{{ $registro->email }}</td>
                        <td>{{ $registro->telefono }}</td>
                        <td>{{ $registro->tipo }}</td>
                        <td>{{ $registro->idiomas }}</td>
                        <td>{{ $registro->turno }}</td>
                        <td>{{ $registro->zona }}</td>
                        <td>{{ $registro->asistencia ? 'Sí' : 'No' }}</td>
                        <td>{{ $registro->estado }}</td>
                        <td>{{ $registro->codigo_qr }}</td>
                        <td>
                            <a href="{{ route('voluntariado.edit', $registro) }}" class="btn btn-warning btn-sm">Editar</a>

                            @if(auth()->user()->role === 'admin')
                            <form action="{{ route('voluntariado.asistencia', $registro) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm">Asistencia</button>
                            </form>

                            <form action="{{ route('voluntariado.destroy', $registro) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Eliminar este registro?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection
</body>
</html>