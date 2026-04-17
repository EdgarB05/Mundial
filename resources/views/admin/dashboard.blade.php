<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrador</title>
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

                            <h3 class="fw-bold mb-1">{{ auth()->user()->name }}</h3>
                            <p class="text-muted mb-3">{{ auth()->user()->email }}</p>
                            <span class="user-role-badge">{{ auth()->user()->role }}</span>
                        </div>

                        <hr>

                        <div class="sidebar-menu my-4">
                            <a href="{{ route('admin-dashboard') }}" class="active">
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

                            <a href="{{ route('voluntariado.index') }}">
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
                        <h1>Panel administrador</h1>
                        <p>
                            Bienvenido, {{ auth()->user()->name }}.
                            Esta sección es exclusiva para usuarios con rol <strong>admin</strong>.
                        </p>
                    </div>

                    <div class="panel-card">
                        <div class="panel-card-header">
                            <span class="panel-badge">Administración</span>
                            <h2 class="panel-title">Gestión de usuarios</h2>
                            <p class="panel-subtitle">Consulta, edita y elimina usuarios registrados en el sistema.</p>
                        </div>

                        <div class="panel-card-body">
                            <div class="top-actions">
                                <div>
                                    <h3 class="fw-bold mb-1">Usuarios registrados</h3>
                                    <p class="text-muted mb-0">Administra cuentas, roles y acceso al sistema.</p>
                                </div>

                                <div class="action-group">
                                    @if(auth()->user()->role === 'admin')
                                        <a href="{{ route('registro') }}" class="btn btn-strong-primary">
                                            <i class="fa-solid fa-user-plus me-2"></i>
                                            Registrar nuevo usuario
                                        </a>
                                    @endif

                                    <a href="{{ route('voluntariado.index') }}" class="btn btn-outline-primary btn-soft">
                                        <i class="fa-solid fa-people-group me-2"></i>
                                        Gestionar voluntariado
                                    </a>

                                    <a href="{{ route('boletos.index') }}" class="btn btn-outline-secondary btn-soft">
                                        Regresar
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
                                                <th>Rol</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->id }}</td>
                                                    <td class="fw-semibold">{{ $user->name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ $user->phone }}</td>
                                                    <td>
                                                        <span class="role-pill
                                                            {{ $user->role === 'admin' ? 'role-admin' : ($user->role === 'empleado' ? 'role-empleado' : 'role-cliente') }}">
                                                            {{ $user->role }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="table-actions">
                                                            <a href="{{ route('usuarios.edit', $user) }}" class="btn btn-warning table-btn">
                                                                <i class="fa-regular fa-pen-to-square"></i>
                                                            </a>

                                                            <form action="{{ route('usuarios.destroy', $user) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger table-btn" onclick="return confirm('¿Eliminar el registro?')">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            @if($users->isEmpty())
                                                <tr>
                                                    <td colspan="6" class="text-center text-muted py-4">
                                                        No hay usuarios registrados.
                                                    </td>
                                                </tr>
                                            @endif
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
