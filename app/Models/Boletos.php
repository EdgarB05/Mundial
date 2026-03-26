<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boletos extends Model
{
    //Indicar los campos que el usuario puede modificar
    protected $fillable = ['equipos', 'estadio', 'fecha', 'hora', 'zona', 'fila', 'asiento'];
}
