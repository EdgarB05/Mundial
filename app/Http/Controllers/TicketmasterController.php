<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\TicketmasterService;
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
        $result = $this->ticketmasterService->searchSoccerMatches([
            'keyword' => $request->string('keyword')->toString(),
            'countryCode' => $request->string('countryCode')->toString() ?: 'MX',
            'size' => min((int) $request->integer('size', 12), 50),
            'page' => max((int) $request->integer('page', 0), 0),
            'startDateTime' => $request->string('startDateTime')->toString() ?: null,
        ]);

        $status = $result['ok'] ? 200 : 422;

        return response()->json($result, $status);
    }
}
