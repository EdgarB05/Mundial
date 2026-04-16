<?php

namespace App\Http\Controllers;

use App\Models\Boletos;
use App\Models\Voluntariado;

class HomeController extends Controller
{
    public function index()
    {
        $boletos = Boletos::latest()->take(3)->get();
        $voluntarios = class_exists(\App\Models\Voluntariado::class)
            ? Voluntariado::latest()->take(3)->get()
            : collect();

        return view('home', compact('boletos', 'voluntarios'));
    }
}