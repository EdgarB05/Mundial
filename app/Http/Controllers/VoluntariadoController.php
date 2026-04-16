<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voluntariado;
use Illuminate\Support\Str;

class VoluntariadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $registros = Voluntariado::latest()->get();
        return view('voluntarios.voluntariado-index', compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('voluntarios.voluntariado-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:voluntariados,email',
            'telefono' => 'required|string|max:20',
            'tipo' => 'required|in:voluntario,staff',
            'idiomas' => 'nullable|string|max:255',
            'habilidades' => 'nullable|string',
            'turno' => 'nullable|string|max:100',
            'zona' => 'nullable|string|max:100',
        ]);

        Voluntariado::create($datos);

        return redirect()->route('voluntariado.index')
            ->with('success', 'Registro creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Voluntariado $voluntariado)
    {
        //
        return redirect()->route('voluntariado.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Voluntariado $voluntariado)
    {
        //
        return view('voluntarios.voluntariado-edit', compact('voluntariado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Voluntariado $voluntariado)
    {
        //
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:voluntariados,email,' . $voluntariado->id,
            'telefono' => 'required|string|max:20',
            'tipo' => 'required|in:voluntario,staff',
            'idiomas' => 'nullable|string|max:255',
            'habilidades' => 'nullable|string',
            'turno' => 'nullable|string|max:100',
            'zona' => 'nullable|string|max:100',
            'estado' => 'required|in:activo,baja',
            'motivo_baja' => 'nullable|string',
            'asistencia' => 'nullable|boolean',
        ]);

        if ($request->has('asistencia') && $request->asistencia) {
            $datos['fecha_asistencia'] = now();
        }

        $voluntariado->update($datos);

        return redirect()->route('voluntariado.index')
            ->with('success', 'Registro actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voluntariado $voluntariado)
    {
        //
        $voluntariado->delete();

        return redirect()->route('voluntariado.index')
            ->with('success', 'Registro eliminado correctamente.');
    }

    public function marcarAsistencia(Voluntariado $voluntariado)
    {
        $voluntariado->update([
            'asistencia' => true,
            'fecha_asistencia' => now(),
        ]);

        return redirect()->route('voluntariado.index')
            ->with('success', 'Asistencia registrada correctamente.');
    }

    public function baja(Request $request, Voluntariado $voluntariado)
    {
        $request->validate([
            'motivo_baja' => 'required|string',
        ]);

        $voluntariado->update([
            'estado' => 'baja',
            'motivo_baja' => $request->motivo_baja,
        ]);

        return redirect()->route('voluntariado.index')
            ->with('success', 'Perfil dado de baja correctamente.');
    }
}
