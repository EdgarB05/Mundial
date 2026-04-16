<?php

namespace App\Services;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class TicketmasterService
{
    private const BASE_URL = 'https://app.ticketmaster.com/discovery/v2';

    public function searchSoccerMatches(array $filters = []): array
    {
        $apiKey = config('services.ticketmaster.api_key');

        if (! $apiKey) {
            return [
                'ok' => false,
                'message' => 'Falta configurar TICKETMASTER_API_KEY en el archivo .env.',
                'data' => [],
            ];
        }

        $params = array_filter([
            'apikey' => $apiKey,
            'keyword' => $filters['keyword'] ?? null,
            'countryCode' => $filters['countryCode'] ?? 'MX',
            'locale' => '*',
            'sort' => 'date,asc',
            'size' => $filters['size'] ?? 12,
            'page' => $filters['page'] ?? 0,
            'startDateTime' => $filters['startDateTime'] ?? now()->utc()->format('Y-m-d\TH:i:s\Z'),
            'classificationName' => 'soccer',
        ], fn ($value) => $value !== null && $value !== '');

        try {
            $response = Http::timeout(20)
                ->acceptJson()
                ->get(self::BASE_URL . '/events.json', $params)
                ->throw()
                ->json();
        } catch (RequestException $exception) {
            $status = $exception->response?->status();
            $message = 'No fue posible consultar Ticketmaster.';

            if ($status === 401) {
                $message = 'La API key de Ticketmaster no es válida o no tiene acceso.';
            }

            return [
                'ok' => false,
                'message' => $message,
                'error' => $exception->response?->json() ?? $exception->getMessage(),
                'data' => [],
            ];
        }

        $events = data_get($response, '_embedded.events', []);

        $matches = collect($events)->map(function (array $event) {
            $localDate = data_get($event, 'dates.start.localDate');
            $localTime = data_get($event, 'dates.start.localTime');
            $venue = data_get($event, '_embedded.venues.0.name');
            $city = data_get($event, '_embedded.venues.0.city.name');
            $country = data_get($event, '_embedded.venues.0.country.countryCode');

            return [
                'id' => data_get($event, 'id'),
                'nombre' => data_get($event, 'name'),
                'equipos' => data_get($event, 'name'),
                'estadio' => $venue,
                'fecha' => $localDate,
                'hora' => $localTime,
                'url' => data_get($event, 'url'),
                'imagen' => collect(data_get($event, 'images', []))
                    ->sortByDesc(fn (array $image) => ($image['width'] ?? 0) * ($image['height'] ?? 0))
                    ->pluck('url')
                    ->first(),
                'ciudad' => $city,
                'pais' => $country,
                'precio_min' => data_get($event, 'priceRanges.0.min'),
                'precio_max' => data_get($event, 'priceRanges.0.max'),
                'moneda' => data_get($event, 'priceRanges.0.currency'),
                'segmento' => data_get($event, 'classifications.0.segment.name'),
                'genero' => data_get($event, 'classifications.0.genre.name'),
                'seatmap' => data_get($event, 'seatmap.staticUrl'),
                'info' => data_get($event, 'info'),
            ];
        })->values()->all();

        return [
            'ok' => true,
            'message' => count($matches) > 0
                ? 'Partidos obtenidos correctamente desde Ticketmaster.'
                : 'No se encontraron partidos con los filtros indicados.',
            'page' => data_get($response, 'page.number', 0),
            'size' => data_get($response, 'page.size', count($matches)),
            'totalElements' => data_get($response, 'page.totalElements', count($matches)),
            'data' => $matches,
        ];
    }
}
