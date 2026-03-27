<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
        <h1>BOLETOS COMPRADOS</h1>
        
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('boletos.create') }}" class="btn btn-success mb-3 me-3">
                <i class="fa-solid fa-plus"></i> Comprar boleto
            </a>

            @if(auth()->user()->role === 'admin')
                <a href="{{ route('admin-dashboard') }}" class="btn btn-secondary mb-3 me-3">
                    Panel Admin
                </a>
            @endif

            @if(auth()->user()->role === 'empleado')
                <a href="{{ route('empleado-dashboard') }}" class="btn btn-primary mb-3 me-3">
                    Panel Empleado
                </a>
            @endif

            <form action="{{ route('cerrar') }}" method="POST">
                @csrf
                <button class="btn btn-danger me-2"><i class="fa-solid fa-arrow-right-to-bracket"></i> Cerrar sesión</button>
            </form>
        </div>

        @include('partials.alerts')

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Equipos</th>
                    <th>Estadio</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Zona</th>
                    <th>Fila</th>
                    <th>Asiento</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($boletos as $boleto)
                    <tr>
                        <td>{{ $boleto->id }}</td>
                        <td>{{ $boleto->equipos }}</td>
                        <td>{{ $boleto->estadio }}</td>
                        <td>{{ $boleto->fecha }}</td>
                        <td>{{ $boleto->hora }}</td>
                        <td>{{ $boleto->zona }}</td>
                        <td>{{ $boleto->fila }}</td>
                        <td>{{ $boleto->asiento }}</td>
                        <td>
                            <a href="{{ route('boletos.edit', $boleto) }}" class="btn btn-warning">
                                <i class="fa-regular fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('boletos.destroy', $boleto) }}" method="POST" class="d-inline">
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