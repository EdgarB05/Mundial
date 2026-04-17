<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar voluntario</title>
</head>
<body>
    @extends('layouts.voluntariado-edit')
    @section('content')
    <div class="voluntariado-edit-page">
        <div class="container">
            <div class="voluntariado-edit-wrapper">
                <div class="voluntariado-edit-card">
                    <div class="voluntariado-edit-header">
                        <span class="voluntariado-edit-badge">Editar registro</span>
                        <h1 class="voluntariado-edit-title">{{ $voluntariado->nombre }}</h1>
                        <p class="voluntariado-edit-subtitle">Actualiza la información del voluntario o miembro del staff.</p>
                    </div>

                    <div class="voluntariado-edit-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @include('partials.alerts')
                        
                        <form action="{{ route('voluntariado.update', $voluntariado) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="section-box">
                                <h2 class="section-title">Información general</h2>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="field-label">Nombre</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-user input-icon"></i>
                                            <input type="text" name="nombre" value="{{ old('nombre', $voluntariado->nombre) }}" placeholder="Nombre" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Correo</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-envelope input-icon"></i>
                                            <input type="email" name="email" value="{{ old('email', $voluntariado->email) }}" placeholder="Correo" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Teléfono</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-phone input-icon"></i>
                                            <input type="text" name="telefono" value="{{ old('telefono', $voluntariado->telefono) }}" placeholder="Teléfono" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Tipo</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-people-group input-icon"></i>
                                            <select name="tipo" class="form-select" required>
                                                <option value="voluntario" {{ old('tipo', $voluntariado->tipo) == 'voluntario' ? 'selected' : '' }}>Voluntario</option>
                                                <option value="staff" {{ old('tipo', $voluntariado->tipo) == 'staff' ? 'selected' : '' }}>Staff</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Idiomas</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-language input-icon"></i>
                                            <input type="text" name="idiomas" value="{{ old('idiomas', $voluntariado->idiomas) }}" placeholder="Idiomas" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Turno</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-clock input-icon"></i>
                                            <input type="text" name="turno" value="{{ old('turno', $voluntariado->turno) }}" placeholder="Turno" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Zona</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-location-dot input-icon"></i>
                                            <input type="text" name="zona" value="{{ old('zona', $voluntariado->zona) }}" placeholder="Zona" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Estado</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-circle-info input-icon"></i>
                                            <select name="estado" class="form-select" required>
                                                <option value="activo" {{ old('estado', $voluntariado->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                                                <option value="baja" {{ old('estado', $voluntariado->estado) == 'baja' ? 'selected' : '' }}>Baja</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section-box">
                                <h2 class="section-title">Detalles operativos</h2>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="field-label">Habilidades</label>
                                        <div class="input-shell textarea-shell">
                                            <i class="fa-solid fa-screwdriver-wrench input-icon"></i>
                                            <textarea name="habilidades" placeholder="Habilidades" class="form-control">{{ old('habilidades', $voluntariado->habilidades) }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Motivo de baja</label>
                                        <div class="input-shell textarea-shell">
                                            <i class="fa-solid fa-note-sticky input-icon"></i>
                                            <textarea name="motivo_baja" placeholder="Motivo de baja" class="form-control">{{ old('motivo_baja', $voluntariado->motivo_baja) }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="check-box">
                                    <div class="form-check mb-0">
                                        <input
                                            type="checkbox"
                                            name="asistencia"
                                            value="1"
                                            class="form-check-input"
                                            id="asistencia"
                                            {{ old('asistencia', $voluntariado->asistencia) ? 'checked' : '' }}
                                        >
                                        <label class="form-check-label" for="asistencia">
                                            Asistencia registrada
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="action-row">
                                <a href="{{ route('voluntariado.index') }}" class="btn btn-outline-secondary btn-back">
                                    Volver
                                </a>

                                <button type="submit" class="btn btn-save">
                                    <i class="fa-solid fa-floppy-disk me-2"></i>
                                    Actualizar registro
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