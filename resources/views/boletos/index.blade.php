<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
</head>
<body>
    @extends('layouts.boletos')

    @section('content')
    <div class="tickets-dashboard">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-xl-3">
                    <div class="dashboard-card sidebar-card">
                        <div class="text-center mb-4">
                            <div class="profile-avatar">
                                <i class="fa-solid fa-user"></i>
                            </div>

                            <h3 class="fw-bold mb-1">{{ auth()->user()->name ?? 'Usuario' }}</h3>
                            <p class="text-muted mb-3">{{ auth()->user()->email ?? 'correo@ejemplo.com' }}</p>
                            <span class="user-role-badge">{{ auth()->user()->role ?? 'usuario' }}</span>
                        </div>

                        <hr>

                        <div class="sidebar-menu my-4">
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin-dashboard') }}">
                                    <i class="fa-solid fa-user-shield"></i>
                                    <span>Panel Admin</span>
                                </a>
                            @endif

                            <a href="{{ route('boletos.index') }}" class="active">
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
                    <div class="dashboard-header mb-4">
                        <h1>Bienvenido de vuelta, {{ auth()->user()->name ?? 'Usuario' }}!</h1>
                        <p>Administra tus boletos del Mundial 2026 y consulta la información de tus partidos.</p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
                        <h2 class="section-title mb-0">Mis boletos ({{ $boletos->count() }})</h2>

                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('boletos.create') }}" class="btn btn-success">
                                <i class="fa-solid fa-plus me-1"></i> Comprar boleto
                            </a>
                        </div>
                    </div>

                    @include('partials.alerts')

                    <div class="row g-4">
                        @forelse($boletos as $index => $boleto)
                            <div class="col-12 col-md-6">
                                <div class="ticket-box">
                                    <div class="ticket-top {{ $index % 3 == 0 ? 'blue' : ($index % 3 == 1 ? 'green' : 'red') }}">
                                        <div class="d-flex justify-content-between align-items-start gap-2">
                                            <span class="ticket-label">
                                                {{ $index == 0 ? 'Group Stage - Match 14' : ($index == 1 ? 'Group Stage - Match 28' : 'Group Stage - Match 35') }}
                                            </span>

                                            <span class="ticket-status status-confirmed">Valid</span>
                                        </div>

                                        <div class="ticket-main-title">{{ $boleto->equipos }}</div>
                                    </div>

                                    <div class="ticket-body">
                                        <div class="ticket-date-row">
                                            <div>
                                                <div class="ticket-meta-label">Venue</div>
                                                <div class="ticket-meta-value">{{ $boleto->estadio }}</div>
                                            </div>

                                            <div class="text-end">
                                                <div class="ticket-meta-label">Date</div>
                                                <div class="ticket-meta-value">{{ $boleto->fecha }}</div>
                                            </div>
                                        </div>

                                        <div class="ticket-section-grid">
                                            <div class="row text-center g-0">
                                                <div class="col-4">
                                                    <div class="ticket-meta-label">Section</div>
                                                    <div class="ticket-meta-value" style="color:#2563eb;">{{ $boleto->zona }}</div>
                                                </div>

                                                <div class="col-4" style="border-left:1px solid #e5e7eb; border-right:1px solid #e5e7eb;">
                                                    <div class="ticket-meta-label">Row</div>
                                                    <div class="ticket-meta-value" style="color:#2563eb;">{{ $boleto->fila }}</div>
                                                </div>

                                                <div class="col-4">
                                                    <div class="ticket-meta-label">Seat</div>
                                                    <div class="ticket-meta-value" style="color:#2563eb;">{{ $boleto->asiento }}</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="ticket-detail">
                                            <i class="fa-solid fa-clock me-2"></i>
                                            {{ substr($boleto->hora, 0, 5) }} hrs
                                        </div>

                                        <div class="ticket-actions">
                                            <a href="{{ route('boletos.edit', $boleto) }}" class="btn ticket-btn">
                                                <i class="fa-solid fa-pen-to-square me-2"></i>
                                                Ver / Editar boleto
                                            </a>

                                            <form action="{{ route('boletos.destroy', $boleto) }}" method="POST" class="mt-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger w-100 rounded-3 fw-bold"
                                                    onclick="return confirm('¿Eliminar el registro?')">
                                                    <i class="fa-solid fa-trash me-2"></i>
                                                    Eliminar boleto
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 col-md-6">
                                <div class="buy-more-card">
                                    <a href="{{ route('boletos.create') }}">
                                        <div class="plus">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <h3 class="fw-bold">Compra tu primer boleto</h3>
                                        <p class="text-muted mb-0">
                                            Explora los partidos disponibles para el Mundial 2026.
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endforelse

                        @if($boletos->count() > 0)
                            <div class="col-12 col-md-6">
                                <div class="buy-more-card">
                                    <a href="{{ route('boletos.create') }}">
                                        <div class="plus">
                                            <i class="fa-solid fa-plus"></i>
                                        </div>
                                        <h3 class="fw-bold">Comprar más boletos</h3>
                                        <p class="text-muted mb-0">
                                            Explora más partidos y agrega nuevos boletos a tu cuenta.
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection

</body>
</html>