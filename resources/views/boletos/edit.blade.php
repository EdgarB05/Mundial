<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    @extends('layouts.boletos-edit')
    @section('content')
    <div class="edit-page">
        <div class="container">
            <div class="edit-wrapper">
                <div class="edit-card">
                    <div class="edit-header">
                        <span class="edit-badge">Editar boleto</span>
                        <h1 class="edit-title">{{ $boleto->equipos }}</h1>
                        <p class="edit-subtitle">Actualiza la información de tu boleto del Mundial 2026.</p>
                    </div>

                    <div class="edit-body">
                        @include('partials.alerts')

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('boletos.update', $boleto) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="section-box">
                                <h2 class="section-title">Información del partido</h2>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="field-label">Equipos</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-users input-icon"></i>
                                            <input
                                                type="text"
                                                name="equipos"
                                                value="{{ old('equipos', $boleto->equipos) }}"
                                                placeholder="Equipos"
                                                class="form-control"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label class="field-label">Estadio</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-futbol input-icon"></i>
                                            <input
                                                type="text"
                                                name="estadio"
                                                value="{{ old('estadio', $boleto->estadio) }}"
                                                placeholder="Estadio"
                                                class="form-control"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Fecha</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-calendar input-icon"></i>
                                            <input
                                                type="date"
                                                name="fecha"
                                                value="{{ old('fecha', $boleto->fecha) }}"
                                                class="form-control"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="field-label">Hora</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-clock input-icon"></i>
                                            <input
                                                type="time"
                                                name="hora"
                                                value="{{ old('hora', substr($boleto->hora, 0, 5)) }}"
                                                class="form-control"
                                                required
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="section-box">
                                <h2 class="section-title">Ubicación del asiento</h2>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="field-label">Zona</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-layer-group input-icon"></i>
                                            <input
                                                type="text"
                                                name="zona"
                                                value="{{ old('zona', $boleto->zona) }}"
                                                placeholder="Zona"
                                                class="form-control"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="field-label">Fila</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-table-cells-large input-icon"></i>
                                            <input
                                                type="number"
                                                name="fila"
                                                value="{{ old('fila', $boleto->fila) }}"
                                                placeholder="Fila"
                                                class="form-control"
                                                min="1"
                                                required
                                            >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="field-label">Asiento</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-chair input-icon"></i>
                                            <input
                                                type="number"
                                                name="asiento"
                                                value="{{ old('asiento', $boleto->asiento) }}"
                                                placeholder="Asiento"
                                                class="form-control"
                                                min="1"
                                                required
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="action-row">
                                <a href="{{ route('boletos.index') }}" class="btn btn-outline-secondary btn-back">
                                    Volver
                                </a>

                                <button type="submit" class="btn btn-save">
                                    <i class="fa-solid fa-floppy-disk me-2"></i>
                                    Guardar cambios
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