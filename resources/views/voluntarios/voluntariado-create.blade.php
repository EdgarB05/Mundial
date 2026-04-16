<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Voluntariado</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
        <h1>Nuevo registro de Voluntariado / Staff</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('voluntariado.store') }}" method="POST">
            @csrf

            <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre" class="form-control mb-3">
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Correo" class="form-control mb-3">
            <input type="text" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono" class="form-control mb-3">

            <select name="tipo" class="form-control mb-3">
                <option value="">Selecciona un tipo</option>
                <option value="voluntario" {{ old('tipo') == 'voluntario' ? 'selected' : '' }}>Voluntario</option>
                <option value="staff" {{ old('tipo') == 'staff' ? 'selected' : '' }}>Staff</option>
            </select>

            <input type="text" name="idiomas" value="{{ old('idiomas') }}" placeholder="Idiomas" class="form-control mb-3">
            <textarea name="habilidades" placeholder="Habilidades" class="form-control mb-3">{{ old('habilidades') }}</textarea>
            <input type="text" name="turno" value="{{ old('turno') }}" placeholder="Turno" class="form-control mb-3">
            <input type="text" name="zona" value="{{ old('zona') }}" placeholder="Zona" class="form-control mb-3">

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('voluntariado.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    @endsection
    
</body>
</html>