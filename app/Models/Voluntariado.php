<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voluntariado extends Model
{
    use HasFactory;

    protected $table = 'voluntariados';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'tipo',
        'idiomas',
        'habilidades',
        'turno',
        'zona',
        'codigo_qr',
        'asistencia',
        'fecha_asistencia',
        'estado',
        'motivo_baja',
    ];

    protected $casts = [
        'asistencia' => 'boolean',
        'fecha_asistencia' => 'datetime',
    ];
}