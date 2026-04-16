<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar voluntario</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
        <h1>Editar registro</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('voluntariado.update', $voluntariado) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="nombre" value="{{ old('nombre', $voluntariado->nombre) }}" placeholder="Nombre" class="form-control mb-3">
            <input type="email" name="email" value="{{ old('email', $voluntariado->email) }}" placeholder="Correo" class="form-control mb-3">
            <input type="text" name="telefono" value="{{ old('telefono', $voluntariado->telefono) }}" placeholder="Teléfono" class="form-control mb-3">

            <select name="tipo" class="form-control mb-3">
                <option value="voluntario" {{ old('tipo', $voluntariado->tipo) == 'voluntario' ? 'selected' : '' }}>Voluntario</option>
                <option value="staff" {{ old('tipo', $voluntariado->tipo) == 'staff' ? 'selected' : '' }}>Staff</option>
            </select>

            <input type="text" name="idiomas" value="{{ old('idiomas', $voluntariado->idiomas) }}" placeholder="Idiomas" class="form-control mb-3">
            <textarea name="habilidades" placeholder="Habilidades" class="form-control mb-3">{{ old('habilidades', $voluntariado->habilidades) }}</textarea>
            <input type="text" name="turno" value="{{ old('turno', $voluntariado->turno) }}" placeholder="Turno" class="form-control mb-3">
            <input type="text" name="zona" value="{{ old('zona', $voluntariado->zona) }}" placeholder="Zona" class="form-control mb-3">

            <select name="estado" class="form-control mb-3">
                <option value="activo" {{ old('estado', $voluntariado->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="baja" {{ old('estado', $voluntariado->estado) == 'baja' ? 'selected' : '' }}>Baja</option>
            </select>

            <textarea name="motivo_baja" placeholder="Motivo de baja" class="form-control mb-3">{{ old('motivo_baja', $voluntariado->motivo_baja) }}</textarea>

            <div class="form-check mb-3">
                <input type="checkbox" name="asistencia" value="1" class="form-check-input" {{ old('asistencia', $voluntariado->asistencia) ? 'checked' : '' }}>
                <label class="form-check-label">Asistencia registrada</label>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('voluntariado.index') }}" class="btn btn-secondary">Volver</a>
        </form>
    @endsection
</body>
</html>