<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Voluntariado</title>
</head>
<body>
    @extends('layouts.voluntariado-create')

    @section('content')
    <div class="page-wrap">
        <div class="container">
            <div class="page-inner">
                <div class="page-card">
                    <div class="page-header">
                        <span class="page-badge">Nuevo registro</span>
                        <h1 class="page-title">Voluntariado / Staff</h1>
                        <p class="page-subtitle">Completa el formulario para registrar una nueva participación en el evento.</p>
                    </div>

                    <div class="page-body">
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

                        <form action="{{ route('voluntariado.store') }}" method="POST">
                            @csrf

                            <div class="section-box">
                                <h2 class="section-title">Información personal</h2>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="field-label">Nombre</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-user input-icon"></i>
                                            <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Correo</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-envelope input-icon"></i>
                                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Correo" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Teléfono</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-phone input-icon"></i>
                                            <input type="text" name="telefono" value="{{ old('telefono') }}" placeholder="Teléfono" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Tipo</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-people-group input-icon"></i>
                                            <select name="tipo" class="form-select" required>
                                                <option value="">Selecciona un tipo</option>
                                                <option value="voluntario" {{ old('tipo') == 'voluntario' ? 'selected' : '' }}>Voluntario</option>
                                                <option value="staff" {{ old('tipo') == 'staff' ? 'selected' : '' }}>Staff</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section-box">
                                <h2 class="section-title">Detalles operativos</h2>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="field-label">Idiomas</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-language input-icon"></i>
                                            <input type="text" name="idiomas" value="{{ old('idiomas') }}" placeholder="Idiomas" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Turno</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-clock input-icon"></i>
                                            <input type="text" name="turno" value="{{ old('turno') }}" placeholder="Turno" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Zona</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-location-dot input-icon"></i>
                                            <input type="text" name="zona" value="{{ old('zona') }}" placeholder="Zona" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Habilidades</label>
                                        <div class="input-shell textarea-shell">
                                            <i class="fa-solid fa-screwdriver-wrench input-icon"></i>
                                            <textarea name="habilidades" placeholder="Habilidades" class="form-control">{{ old('habilidades') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="action-row">
                                @auth
                                    <a href="{{ route('voluntariado.index') }}" class="btn btn-outline-secondary btn-back">
                                        Volver
                                    </a>
                                @else
                                    <a href="{{ route('home') }}" class="btn btn-outline-secondary btn-back">
                                        Volver
                                    </a>
                                @endauth

                                <button type="submit" class="btn btn-save">
                                    <i class="fa-solid fa-floppy-disk me-2"></i>
                                    Guardar registro
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