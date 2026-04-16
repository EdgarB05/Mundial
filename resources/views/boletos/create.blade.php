<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra boleto</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="mb-1">COMPRA DE BOLETO</h1>
                <p class="text-muted mb-0">Consulta partidos de fútbol desde Ticketmaster.</p>
            </div>
            <a href="{{ route('boletos.index') }}" class="btn btn-outline-secondary">Ver boletos</a>
        </div>

        <div id="api-alert" class="alert d-none" role="alert"></div>

        <div class="card mb-4">
            <div class="card-body">
                <div class="row g-3 align-items-end">
                    <div class="col-md-5">
                        <label for="keyword" class="form-label">Buscar partido o equipo</label>
                        <input type="text" id="keyword" class="form-control" placeholder="Ej. América, Chivas, Real Madrid">
                    </div>
                    <div class="col-md-3">
                        <label for="countryCode" class="form-label">País</label>
                        <select id="countryCode" class="form-select">
                            <option value="MX" selected>México</option>
                            <option value="US">Estados Unidos</option>
                            <option value="ES">España</option>
                            <option value="GB">Reino Unido</option>
                            <option value="CA">Canadá</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="size" class="form-label">Resultados</label>
                        <select id="size" class="form-select">
                            <option value="6">6</option>
                            <option value="12" selected>12</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div class="col-md-2 d-grid">
                        <button type="button" class="btn btn-primary" id="buscar-partidos">
                            <i class="fa-solid fa-magnifying-glass"></i> Buscar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-7">
                <div class="card mb-4">
                    <div class="card-header bg-light">
                        Partidos encontrados en Ticketmaster
                    </div>
                    <div class="card-body">
                        <div id="loading-partidos" class="text-muted d-none">Consultando Ticketmaster...</div>
                        <div id="contenedor-partidos" class="row g-3"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header bg-light">
                        Guardar boleto con API
                    </div>
                    <div class="card-body">
                        <form id="boleto-form">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-users"></i></span>
                                <input type="text" name="equipos" placeholder="Equipos" class="form-control" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-futbol"></i></span>
                                <input type="text" name="estadio" placeholder="Estadio" class="form-control" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                                <input type="date" name="fecha" class="form-control" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-clock"></i></span>
                                <input type="time" name="hora" class="form-control" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-brands fa-cc-diners-club"></i></span>
                                <input type="text" name="zona" placeholder="Zona" class="form-control" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-table-cells-large"></i></span>
                                <input type="number" name="fila" placeholder="Fila" class="form-control" min="1" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa-solid fa-chair"></i></span>
                                <input type="number" name="asiento" placeholder="Asiento" class="form-control" min="1" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-outline-primary" id="guardar-boleto">
                                    <i class="fa-solid fa-floppy-disk"></i> Guardar con API
                                </button>
                            </div>
                        </form>
                    </div>
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
                apiAlert.className = `alert alert-${tipo}`;
                apiAlert.textContent = mensaje;
                apiAlert.classList.remove('d-none');
            }

            function limpiarAlerta() {
                apiAlert.className = 'alert d-none';
                apiAlert.textContent = '';
            }

            function pintarPartidos(partidos) {
                contenedorPartidos.innerHTML = '';

                if (!partidos.length) {
                    contenedorPartidos.innerHTML = '<div class="col-12"><p class="text-muted mb-0">No se encontraron partidos.</p></div>';
                    return;
                }

                partidos.forEach((partido) => {
                    const card = document.createElement('div');
                    card.className = 'col-12';
                    card.innerHTML = `
                        <div class="card shadow-sm h-100">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="${partido.imagen || 'https://placehold.co/640x360?text=Sin+imagen'}" class="img-fluid rounded-start h-100 object-fit-cover" alt="${partido.nombre}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">${partido.nombre ?? 'Partido sin nombre'}</h5>
                                        <p class="card-text mb-1"><strong>Estadio:</strong> ${partido.estadio ?? 'No disponible'}</p>
                                        <p class="card-text mb-1"><strong>Fecha:</strong> ${partido.fecha ?? 'No disponible'}</p>
                                        <p class="card-text mb-1"><strong>Hora:</strong> ${partido.hora ?? 'No disponible'}</p>
                                        <p class="card-text mb-3"><strong>Ubicación:</strong> ${partido.ciudad ?? 'N/D'} ${partido.pais ? '(' + partido.pais + ')' : ''}</p>
                                        <div class="d-flex gap-2 flex-wrap">
                                            <button type="button" class="btn btn-sm btn-success seleccionar-partido">Seleccionar</button>
                                            ${partido.url ? `<a href="${partido.url}" target="_blank" class="btn btn-sm btn-outline-secondary">Ver evento</a>` : ''}
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
                        window.scrollTo({ top: boletoForm.offsetTop - 100, behavior: 'smooth' });
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
    @endsection
</body>
</html>