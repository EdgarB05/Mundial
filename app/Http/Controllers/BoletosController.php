<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Uso del modelo
use App\Models\Boletos;

class BoletosController extends Controller
{
    /**
     * Consultar a los libros en la bd
     */
    public function index()
    {
        // Obtener los datos del modelo
        $boletos = Boletos::all();

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
        //Esquema para enviar datos a la BD
        Boletos::create([
            'equipos' => $request -> equipos,
            'estadio' => $request ->estadio,
            'fecha' => $request ->fecha,
            'hora' => $request ->hora,
            'zona' => $request ->zona,
            'fila' => $request ->fila,
            'asiento' => $request ->asiento,            
        ]);

        //Enviar al usuarios a otra página
        return redirect()->route('boletos.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Boletos $boleto)
    {
        //
        return view('boletos.edit', compact('boleto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Boletos $boleto)
    {
        //
        $request -> validate([
            'equipos' => 'required',
            'estadio' => 'required',
            'fecha' => 'required',
            'hora' => 'required',
            'zona' => 'required',
            'fila' => 'required',
            'asiento' => 'required',            

        ]);

        $boleto -> update($request->all());

        return redirect() -> route('boletos.index')
        -> with('success', 'Actualización con éxito');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Boletos $boleto)
    {
        //
        $boleto -> delete();
        
        return redirect() -> route('boletos.index')
        -> with('success', 'Boleto eliminado');
    }
}
