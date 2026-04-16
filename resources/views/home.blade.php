<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundial 2026</title>
</head>
<body>
    @extends('layouts.home')

    @section('content')

    <nav class="navbar navbar-expand-lg navbar-light navbar-home fixed-top shadow-sm">
        <div class="container-fluid px-4">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">FIFA World Cup 2026</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuHome">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menuHome">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('boletos.index') }}">Boletos</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('voluntariado.index') }}">Voluntariado</a></li>
                    @endauth
                </ul>

                <div class="d-flex">
                    @auth
                        <a href="{{ route('boletos.index') }}" class="btn btn-primary">Panel</a>
                    @else
                        <a href="{{ route('acceso') }}" class="btn btn-primary">Iniciar sesión</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <section class="hero-section">
        <div class="container py-5">
            <div class="col-lg-7">
                <span class="badge bg-primary mb-3 px-3 py-2">Norteamérica 2026</span>
                <h1 class="display-2 fw-bold mb-4">Unidos en 2026</h1>
                <p class="lead mb-4">
                    Vive el evento deportivo más grande del mundo.
                </p>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('boletos.create') }}" class="btn btn-primary btn-lg">
                        Comprar boletos
                    </a>

                    @auth
                        <a href="{{ route('boletos.index') }}" class="btn hero-btn-outline btn-lg">
                            Consultar estado
                        </a>
                    @else
                        <a href="{{ route('acceso') }}" class="btn hero-btn-outline btn-lg">
                            Consultar estado
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 section-pattern">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <small class="text-primary text-uppercase fw-bold">Próximos encuentros</small>
                <h2 class="fw-bold">Vista previa de partidos</h2>
                <p class="text-muted mb-0">Resultados obtenidos desde Ticketmaster.</p>
            </div>
                <a href="{{ route('boletos.create') }}" class="btn btn-link text-decoration-none">
                    Ver más partidos
                </a>
            </div>

            <div id="partidos-alert" class="alert d-none" role="alert"></div>

            <div class="row g-4" id="home-partidos-container">
                <div class="col-12">
                    <div class="alert alert-light border mb-0">
                        Cargando partidos...
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('boletos.create') }}" class="btn btn-primary btn-lg">
                    Ver más en comprar boletos
                </a>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="mb-4">
                <small class="text-primary text-uppercase fw-bold">Explora el torneo</small>
                <h2 class="fw-bold">Ciudades sede</h2>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card city-card h-100">
                        <img src="https://images.unsplash.com/photo-1467269204594-9661b134dd2b" class="city-image" alt="Nueva York">
                        <div class="card-body">
                            <h4 class="fw-bold">Nueva York / Nueva Jersey</h4>
                            <p class="mb-0 text-muted">MetLife Stadium • Sede de la Final</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card city-card h-100">
                        <img src="https://images.unsplash.com/photo-1585464231875-d9ef1f5ad396" class="city-image" alt="Ciudad de México">
                        <div class="card-body">
                            <h5 class="fw-bold">Ciudad de México</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card city-card h-100">
                        <img src="https://images.unsplash.com/photo-1534190760961-74e8c1c5c3da" class="city-image" alt="Los Ángeles">
                        <div class="card-body">
                            <h5 class="fw-bold">Los Ángeles</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white">
        <div class="container">
            <div class="mb-4">
                <small class="text-primary text-uppercase fw-bold">Historias del torneo</small>
                <h2 class="fw-bold">Últimas noticias</h2>
            </div>

            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="card news-card h-100">
                        <img src="https://images.unsplash.com/photo-1517466787929-bc90951d0974" class="news-image" alt="Voluntariado">
                        <div class="card-body">
                            <span class="badge bg-primary-subtle text-primary">Preparación</span>
                            <h4 class="fw-bold mt-3">El programa de voluntariado abre oficialmente</h4>
                            <p class="text-muted">
                                Gestiona postulaciones, zonas, turnos y asistencia del personal de apoyo del estadio.
                            </p>
                            <a href="{{ route('voluntariado.index') }}" class="btn btn-outline-primary">Ir al módulo</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card news-card h-100">
                        <img src="https://images.unsplash.com/photo-1517649763962-0c623066013b" class="news-image" alt="Balón">
                        <div class="card-body">
                            <h5 class="fw-bold">Tecnología del balón oficial</h5>
                            <p class="text-muted mb-0">Innovación aplicada al seguimiento del juego.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="card news-card h-100">
                        <img src="https://images.unsplash.com/photo-1508098682722-e99c643e7f0b" class="news-image" alt="Ciudades sede">
                        <div class="card-body">
                            <h5 class="fw-bold">Objetivos de sostenibilidad</h5>
                            <p class="text-muted mb-0">Operación eficiente y mejor experiencia para asistentes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-primary text-white">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">No te pierdas ni un momento</h2>
            <p class="mb-4">Consulta boletos, información del torneo y novedades del sistema.</p>

            <div class="d-flex flex-column flex-md-row gap-3 justify-content-center">
                <a href="{{ route('acceso') }}" >
                    <button class="btn btn-dark">Unirse al club</button>
                </a>
            </div>
        </div>
    </section>

    <footer class="footer-home py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <h5 class="fw-bold">FIFA World Cup 2026</h5>
                    <p class="text-white-50 mb-0">
                        Sistema de gestión para boletos, voluntariado y operación del estadio.
                    </p>
                </div>

                <div class="col-md-3">
                    <h6 class="fw-bold">Módulos</h6>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('boletos.index') }}" class="text-white-50 text-decoration-none">Boletos</a></li>
                        @auth
                            <li><a href="{{ route('voluntariado.index') }}" class="text-white-50 text-decoration-none">Voluntariado</a></li>
                        @endauth
                    </ul>
                </div>

                <div class="col-md-3">
                    <h6 class="fw-bold">Acceso</h6>
                    <ul class="list-unstyled">
                        @auth
                            <li><a href="{{ route('boletos.index') }}" class="text-white-50 text-decoration-none">Panel</a></li>
                        @else
                            <li><a href="{{ route('acceso') }}" class="text-white-50 text-decoration-none">Iniciar sesión</a></li>
                            <li><a href="{{ route('registro') }}" class="text-white-50 text-decoration-none">Registrarse</a></li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', async function () {
            const contenedor = document.getElementById('home-partidos-container');
            const alerta = document.getElementById('partidos-alert');

            const limitePartidos = 3;

            function mostrarAlerta(mensaje, tipo = 'info') {
                alerta.className = `alert alert-${tipo}`;
                alerta.textContent = mensaje;
                alerta.classList.remove('d-none');
            }

            function limpiarAlerta() {
                alerta.className = 'alert d-none';
                alerta.textContent = '';
            }

            function renderizarPartidos(partidos) {
                contenedor.innerHTML = '';

                if (!partidos.length) {
                    contenedor.innerHTML = `
                        <div class="col-12">
                            <div class="alert alert-light border mb-0">
                                No se encontraron partidos en este momento.
                            </div>
                        </div>
                    `;
                    return;
                }

                partidos.slice(0, limitePartidos).forEach((partido) => {
                    const card = document.createElement('div');
                    card.className = 'col-md-4';

                    card.innerHTML = `
                        <div class="card match-card h-100">
                            <div class="card-header bg-primary text-white py-4">
                                <small class="text-uppercase fw-bold">Partido disponible</small>
                                <h5 class="mb-0 mt-2">${partido.equipos ?? partido.nombre ?? 'Partido sin nombre'}</h5>
                            </div>
                            <div class="card-body">
                                <p class="mb-2"><strong>Fecha:</strong> ${partido.fecha ?? 'No disponible'}</p>
                                <p class="mb-2"><strong>Hora:</strong> ${partido.hora ? partido.hora.substring(0,5) : 'No disponible'}</p>
                                <p class="mb-3"><strong>Sede:</strong> ${partido.estadio ?? 'No disponible'}</p>
                                <a href="{{ route('boletos.create') }}" class="btn btn-outline-primary w-100">
                                    Comprar boleto
                                </a>
                            </div>
                        </div>
                    `;

                    contenedor.appendChild(card);
                });
            }

            try {
                limpiarAlerta();

                const params = new URLSearchParams({
                    keyword: 'soccer',
                    countryCode: 'MX',
                    size: limitePartidos.toString()
                });

                const response = await fetch(`/api/partidos?${params.toString()}`, {
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (!response.ok) {
                    throw new Error(result.message || 'No se pudieron cargar los partidos.');
                }

                renderizarPartidos(result.data || []);

                if ((result.data || []).length === 0) {
                    mostrarAlerta('No hay partidos disponibles por ahora.', 'warning');
                }
            } catch (error) {
                contenedor.innerHTML = `
                    <div class="col-12">
                        <div class="alert alert-light border mb-0">
                            No fue posible cargar los partidos desde la API.
                        </div>
                    </div>
                `;
                mostrarAlerta(error.message, 'danger');
            }
        });
    </script>

    @endsection
</body>
</html>