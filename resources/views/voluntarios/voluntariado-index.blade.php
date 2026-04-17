<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voluntariado</title>
</head>
<body>
    @extends('layouts.admin')
    @section('content')
    <div class="admin-dashboard">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-xl-3">
                    <div class="dashboard-card sidebar-card">
                        <div class="text-center mb-4">
                            <div class="profile-avatar">
                                <i class="fa-solid fa-user"></i>
                            </div>

                            <h3 class="fw-bold mb-1">{{ auth()->user()->name ?? 'Usuario' }}</h3>
                            <p class="text-muted mb-3">{{ auth()->user()->email ?? 'Sin sesión' }}</p>
                            <span class="user-role-badge">{{ auth()->user()->role ?? 'invitado' }}</span>
                        </div>

                        <hr>

                        <div class="sidebar-menu my-4">
                            <a href="{{ route('admin-dashboard') }}">
                                <i class="fa-solid fa-user-shield"></i>
                                <span>Panel Admin</span>
                            </a>

                            <a href="{{ route('boletos.index') }}">
                                <i class="fa-solid fa-ticket"></i>
                                <span>Mis boletos</span>
                            </a>

                            <a href="{{ route('home') }}">
                                <i class="fa-solid fa-house"></i>
                                <span>Inicio</span>
                            </a>

                            <a href="{{ route('registro') }}">
                                <i class="fa-solid fa-user-plus"></i>
                                <span>Registrar usuario</span>
                            </a>

                            <a href="{{ route('voluntariado.index') }}" class="active">
                                <i class="fa-solid fa-people-group"></i>
                                <span>Voluntariado</span>
                            </a>
                        </div>

                        <form action="{{ route('cerrar') }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="signout-btn">
                                <i class="fa-solid fa-right-from-bracket me-2"></i>
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-8 col-xl-9">
                    <div class="dashboard-header">
                        <h1>Voluntariado y Staff</h1>
                        <p>Gestiona registros, asistencia, estado y datos operativos del personal del evento.</p>
                    </div>

                    <div class="panel-card">
                        <div class="panel-card-header">
                            <span class="panel-badge">Operación</span>
                            <h2 class="panel-title">Gestión de voluntariado</h2>
                            <p class="panel-subtitle">Administra voluntarios y staff asignados al sistema del Mundial 2026.</p>
                        </div>

                        <div class="panel-card-body">
                            <div class="top-actions">
                                <div>
                                    <h3 class="fw-bold mb-1">Registros disponibles</h3>
                                    <p class="text-muted mb-0">Consulta la información, actualiza asistencia y administra el estado de cada integrante.</p>
                                </div>

                                <div class="action-group">
                                    <a href="{{ route('voluntariado.create') }}" class="btn btn-strong-primary">
                                        <i class="fa-solid fa-plus me-2"></i>
                                        Nuevo registro
                                    </a>

                                    <a href="{{ route('admin-dashboard') }}" class="btn btn-outline-secondary btn-soft">
                                        Volver
                                    </a>
                                </div>
                            </div>

                            @include('partials.alerts')

                            <div class="table-wrapper">
                                <div class="table-responsive">
                                    <table class="table table-custom align-middle">
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
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($registros as $registro)
                                                <tr>
                                                    <td>{{ $registro->id }}</td>
                                                    <td class="fw-semibold">{{ $registro->nombre }}</td>
                                                    <td>{{ $registro->email }}</td>
                                                    <td>{{ $registro->telefono }}</td>
                                                    <td>
                                                        <span class="role-pill {{ $registro->tipo === 'staff' ? 'role-admin' : 'role-empleado' }}">
                                                            {{ $registro->tipo }}
                                                        </span>
                                                    </td>
                                                    <td>{{ $registro->idiomas ?: '—' }}</td>
                                                    <td>{{ $registro->turno ?: '—' }}</td>
                                                    <td>{{ $registro->zona ?: '—' }}</td>
                                                    <td>
                                                        <span class="role-pill {{ $registro->asistencia ? 'role-empleado' : 'role-cliente' }}">
                                                            {{ $registro->asistencia ? 'Sí' : 'No' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <span class="role-pill {{ $registro->estado === 'activo' ? 'role-empleado' : 'role-cliente' }}">
                                                            {{ $registro->estado }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="table-actions">
                                                            <a href="{{ route('voluntariado.edit', $registro) }}" class="btn btn-warning table-btn">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </a>

                                                            @if(auth()->user()->role === 'admin')
                                                                <form action="{{ route('voluntariado.asistencia', $registro) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <button type="submit" class="btn btn-success table-btn">
                                                                        <i class="fa-solid fa-check"></i>
                                                                    </button>
                                                                </form>

                                                                <form action="{{ route('voluntariado.destroy', $registro) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este registro?')">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger table-btn">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="12" class="text-center text-muted py-4">
                                                        No hay registros de voluntariado o staff.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>