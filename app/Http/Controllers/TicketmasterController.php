<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\TicketmasterService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TicketmasterController extends Controller
{
    //
    public function __construct(private readonly TicketmasterService $ticketmasterService)
    {
    }

    public function partidos(Request $request): JsonResponse
    {
        $keyword = $request->string('keyword')->toString();
        $countryCode = $request->string('countryCode')->toString() ?: 'MX';
        $size = min((int) $request->integer('size', 12), 50);
        $page = max((int) $request->integer('page', 0), 0);
        $startDateTime = $request->string('startDateTime')->toString() ?: null;

        $cacheKey = 'ticketmaster_partidos_' . md5(json_encode([
            'keyword' => $keyword,
            'countryCode' => $countryCode,
            'size' => $size,
            'page' => $page,
            'startDateTime' => $startDateTime,
        ]));

        $result = Cache::remember($cacheKey, now()->addMinutes(10), function () use (
            $keyword,
            $countryCode,
            $size,
            $page,
            $startDateTime
        ) {
            return $this->ticketmasterService->searchSoccerMatches([
                'keyword' => $keyword,
                'countryCode' => $countryCode,
                'size' => $size,
                'page' => $page,
                'startDateTime' => $startDateTime,
            ]);
        });

        $status = $result['ok'] ? 200 : 422;

        return response()->json($result, $status);
    }
}
