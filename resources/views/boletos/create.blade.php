<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra boleto</title>
</head>
<body>
    @extends('layouts.boletos-create')

    @section('content')
    <div class="create-page">
        <div class="container">
            <div class="create-wrapper">
                <div class="create-card">
                    <div class="create-header">
                        <span class="create-badge">Compra de boleto</span>
                        <h1 class="create-title">Selecciona tu partido y guarda tu boleto</h1>
                        <p class="create-subtitle">Consulta partidos desde Ticketmaster y registra tu boleto en el sistema.</p>
                    </div>

                    <div class="create-body">
                        <div class="top-actions">
                            <div>
                                <h2 class="section-title mb-1">Búsqueda de partidos</h2>
                                <p class="text-muted mb-0">Encuentra eventos disponibles y completa los datos de tu asiento.</p>
                            </div>

                            <a href="{{ route('boletos.index') }}" class="btn btn-outline-secondary btn-outline-soft">
                                Volver a mis boletos
                            </a>
                        </div>

                        <div id="api-alert" class="alert d-none api-alert" role="alert"></div>

                        <div class="row g-4">
                            <div class="col-lg-7">
                                <div class="section-box">
                                    <h3 class="section-title">Buscar en Ticketmaster</h3>

                                    <div class="row g-3 align-items-end mb-3">
                                        <div class="col-md-5">
                                            <label for="keyword" class="field-label">Buscar partido o equipo</label>
                                            <div class="input-shell mb-0">
                                                <i class="fa-solid fa-magnifying-glass input-icon"></i>
                                                <input type="text" id="keyword" class="form-control" placeholder="Ej. América, Chivas, Real Madrid">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="countryCode" class="field-label">País</label>
                                            <div class="input-shell mb-0">
                                                <i class="fa-solid fa-globe input-icon"></i>
                                                <select id="countryCode" class="form-select">
                                                    <option value="MX" selected>México</option>
                                                    <option value="US">Estados Unidos</option>
                                                    <option value="ES">España</option>
                                                    <option value="GB">Reino Unido</option>
                                                    <option value="CA">Canadá</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <label for="size" class="field-label">Resultados</label>
                                            <div class="input-shell mb-0">
                                                <i class="fa-solid fa-list-ol input-icon"></i>
                                                <select id="size" class="form-select">
                                                    <option value="6">6</option>
                                                    <option value="12" selected>12</option>
                                                    <option value="20">20</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-2 d-grid">
                                            <button type="button" class="btn btn-primary-strong" id="buscar-partidos">
                                                Buscar
                                            </button>
                                        </div>
                                    </div>

                                    <div id="loading-partidos" class="text-muted d-none mb-3">Consultando Ticketmaster...</div>

                                    <div id="contenedor-partidos" class="row g-3 results-scroll"></div>
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="section-box sticky-box">
                                    <h3 class="section-title">Guardar boleto</h3>

                                    <form id="boleto-form">
                                        @csrf

                                        <label class="field-label">Equipos</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-users input-icon"></i>
                                            <input type="text" name="equipos" placeholder="Equipos" class="form-control" required>
                                        </div>

                                        <label class="field-label">Estadio</label>
                                        <div class="input-shell">
                                            <i class="fa-solid fa-futbol input-icon"></i>
                                            <input type="text" name="estadio" placeholder="Estadio" class="form-control" required>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="field-label">Fecha</label>
                                                <div class="input-shell">
                                                    <i class="fa-solid fa-calendar input-icon"></i>
                                                    <input type="date" name="fecha" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <label class="field-label">Hora</label>
                                                <div class="input-shell">
                                                    <i class="fa-solid fa-clock input-icon"></i>
                                                    <input type="time" name="hora" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label class="field-label">Zona</label>
                                                <div class="input-shell">
                                                    <i class="fa-solid fa-layer-group input-icon"></i>
                                                    <input type="text" name="zona" placeholder="Zona" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="field-label">Fila</label>
                                                <div class="input-shell">
                                                    <i class="fa-solid fa-table-cells-large input-icon"></i>
                                                    <input type="number" name="fila" placeholder="Fila" class="form-control" min="1" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <label class="field-label">Asiento</label>
                                                <div class="input-shell">
                                                    <i class="fa-solid fa-chair input-icon"></i>
                                                    <input type="number" name="asiento" placeholder="Asiento" class="form-control" min="1" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="submit-area">
                                            <a href="{{ route('boletos.index') }}" class="btn btn-outline-secondary btn-outline-soft">
                                                Cancelar
                                            </a>

                                            <button type="submit" class="btn btn-primary-strong" id="guardar-boleto">
                                                <i class="fa-solid fa-floppy-disk me-2"></i> Guardar con API
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <script>
                            const buscarBtn = document.getElementById('buscar-partidos');
                            const loadingPartidos = document.getElementById('loading-partidos');
                            const contenedorPartidos = document.getElementById('contenedor-partidos');
                            const boletoForm = document.getElementById('boleto-form');
                            const apiAlert = document.getElementById('api-alert');

                            function mostrarAlerta(mensaje, tipo = 'success') {
                                apiAlert.className = `alert alert-${tipo} api-alert`;
                                apiAlert.textContent = mensaje;
                                apiAlert.classList.remove('d-none');
                            }

                            function limpiarAlerta() {
                                apiAlert.className = 'alert d-none api-alert';
                                apiAlert.textContent = '';
                            }

                            function pintarPartidos(partidos) {
                                contenedorPartidos.innerHTML = '';

                                if (!partidos.length) {
                                    contenedorPartidos.innerHTML = `
                                        <div class="col-12">
                                            <div class="alert alert-light border mb-0">No se encontraron partidos.</div>
                                        </div>
                                    `;
                                    return;
                                }

                                partidos.forEach((partido) => {
                                    const card = document.createElement('div');
                                    card.className = 'col-12';

                                    const imagen = partido.imagen
                                        ? `<img src="${partido.imagen}" class="match-image" alt="${partido.nombre ?? 'Partido'}">`
                                        : `<div class="placeholder-image"><i class="fa-solid fa-futbol"></i></div>`;

                                    card.innerHTML = `
                                        <div class="match-card">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    ${imagen}
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body p-4">
                                                        <h5 class="card-title">${partido.nombre ?? 'Partido sin nombre'}</h5>
                                                        <p class="card-text mb-1"><strong>Estadio:</strong> ${partido.estadio ?? 'No disponible'}</p>
                                                        <p class="card-text mb-1"><strong>Fecha:</strong> ${partido.fecha ?? 'No disponible'}</p>
                                                        <p class="card-text mb-1"><strong>Hora:</strong> ${partido.hora ?? 'No disponible'}</p>
                                                        <p class="card-text mb-3"><strong>Ubicación:</strong> ${partido.ciudad ?? 'N/D'} ${partido.pais ? '(' + partido.pais + ')' : ''}</p>
                                                        <div class="d-flex gap-2 flex-wrap">
                                                            <button type="button" class="btn btn-success seleccionar-partido">Seleccionar</button>
                                                            ${partido.url ? `<a href="${partido.url}" target="_blank" class="btn btn-outline-secondary">Ver evento</a>` : ''}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    `;

                                    card.querySelector('.seleccionar-partido').addEventListener('click', () => {
                                        boletoForm.equipos.value = partido.equipos ?? '';
                                        boletoForm.estadio.value = partido.estadio ?? '';
                                        boletoForm.fecha.value = partido.fecha ?? '';
                                        boletoForm.hora.value = (partido.hora ?? '').slice(0, 5);
                                        mostrarAlerta('Partido cargado en el formulario. Solo completa zona, fila y asiento.', 'info');
                                        window.scrollTo({ top: boletoForm.offsetTop - 120, behavior: 'smooth' });
                                    });

                                    contenedorPartidos.appendChild(card);
                                });
                            }

                            async function buscarPartidos() {
                                limpiarAlerta();
                                loadingPartidos.classList.remove('d-none');
                                contenedorPartidos.innerHTML = '';

                                const params = new URLSearchParams({
                                    keyword: document.getElementById('keyword').value,
                                    countryCode: document.getElementById('countryCode').value,
                                    size: document.getElementById('size').value,
                                });

                                try {
                                    const response = await fetch(`/api/partidos?${params.toString()}`);
                                    const result = await response.json();

                                    if (!response.ok) {
                                        throw new Error(result.message || 'Ocurrió un error al consultar Ticketmaster.');
                                    }

                                    pintarPartidos(result.data || []);
                                    mostrarAlerta(result.message, 'success');
                                } catch (error) {
                                    pintarPartidos([]);
                                    mostrarAlerta(error.message, 'danger');
                                } finally {
                                    loadingPartidos.classList.add('d-none');
                                }
                            }

                            buscarBtn.addEventListener('click', buscarPartidos);

                            boletoForm.addEventListener('submit', async (event) => {
                                event.preventDefault();
                                limpiarAlerta();

                                const payload = Object.fromEntries(new FormData(boletoForm).entries());

                                try {
                                    const response = await fetch('/api/boletos', {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'Accept': 'application/json',
                                            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                                        },
                                        body: JSON.stringify(payload),
                                    });

                                    const result = await response.json();

                                    if (!response.ok) {
                                        const validationErrors = result.errors
                                            ? Object.values(result.errors).flat().join(' ')
                                            : null;

                                        throw new Error(validationErrors || result.message || 'No se pudo guardar el boleto.');
                                    }

                                    boletoForm.reset();
                                    mostrarAlerta(result.message + ' Ya puedes revisar el registro en la lista de boletos.', 'success');
                                } catch (error) {
                                    mostrarAlerta(error.message, 'danger');
                                }
                            });

                            buscarPartidos();
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>