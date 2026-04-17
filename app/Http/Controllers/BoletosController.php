<?php

namespace App\Http\Controllers;

use App\Models\Boletos;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BoletosController extends Controller
{

    public function index()
    {
        $boletos = Boletos::latest()->get();
        return view('boletos.index', compact('boletos'));
    }

    /**
     * Retornar la vista del formulario de registro
     */
    public function create()
    {
        return view('boletos.create');
    }

    /**
     * Guardar datos en la bd
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'equipos' => ['required', 'string', 'max:255'],
            'estadio' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date'],
            'hora' => ['required', 'date_format:H:i'],
            'zona' => ['required', 'string', 'max:50'],
            'fila' => ['required', 'integer', 'min:1'],
            'asiento' => ['required', 'integer', 'min:1'],
        ]);

        Boletos::create($validated);

        return redirect()
            ->route('boletos.index')
            ->with('success', 'Boleto almacenado correctamente.');
    }

    public function show(Boletos $boleto)
    {
        return redirect()->route('boletos.index');
    }

    public function edit(Boletos $boleto)
    {
        return view('boletos.edit', compact('boleto'))
            ->with('warning', 'Estás editando un boleto. Verifica los datos antes de guardar los cambios.');
    }

    public function update(Request $request, Boletos $boleto)
    {
        $datos = $request->validate([
            'equipos' => 'required|string|max:255',
            'estadio' => 'required|string|max:255',
            'fecha' => 'required|date',
            'hora' => 'required',
            'zona' => 'required|string|max:50',
            'fila' => 'required|integer|min:1',
            'asiento' => 'required|integer|min:1',
        ]);

        $boleto->update($datos);

        return redirect()->route('boletos.index')
            ->with('success', 'Actualización con éxito');
    }

    public function destroy(Boletos $boleto)
    {
        $boleto->delete();

        return redirect()
            ->route('boletos.index')
            ->with('success', 'Boleto eliminado correctamente.');
    }

    /* =========================
       MÉTODOS API (JSON)
       ========================= */

    public function apiIndex(): JsonResponse
    {
        return response()->json([
            'message' => 'Boletos obtenidos correctamente.',
            'data' => Boletos::latest()->get(),
        ]);
    }

    public function apiStore(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'equipos' => ['required', 'string', 'max:255'],
            'estadio' => ['required', 'string', 'max:255'],
            'fecha' => ['required', 'date'],
            'hora' => ['required', 'date_format:H:i'],
            'zona' => ['required', 'string', 'max:50'],
            'fila' => ['required', 'integer', 'min:1'],
            'asiento' => ['required', 'integer', 'min:1'],
        ]);

        $boleto = Boletos::create($validated);

        return response()->json([
            'message' => 'Boleto almacenado correctamente.',
            'data' => $boleto,
        ], 201);
    }

    public function apiShow(Boletos $boleto): JsonResponse
    {
        return response()->json([
            'message' => 'Boleto obtenido correctamente.',
            'data' => $boleto,
        ]);
    }

    public function apiUpdate(Request $request, Boletos $boleto): JsonResponse
    {
        $validated = $request->validate([
            'equipos' => ['sometimes', 'required', 'string', 'max:255'],
            'estadio' => ['sometimes', 'required', 'string', 'max:255'],
            'fecha' => ['sometimes', 'required', 'date'],
            'hora' => ['sometimes', 'required', 'date_format:H:i'],
            'zona' => ['sometimes', 'required', 'string', 'max:50'],
            'fila' => ['sometimes', 'required', 'integer', 'min:1'],
            'asiento' => ['sometimes', 'required', 'integer', 'min:1'],
        ]);

        $boleto->update($validated);

        return response()->json([
            'message' => 'Boleto actualizado correctamente.',
            'data' => $boleto->fresh(),
        ]);
    }

    public function apiDestroy(Boletos $boleto): JsonResponse
    {
        $boleto->delete();

        return response()->json([
            'message' => 'Boleto eliminado correctamente.',
        ]);
    }
}