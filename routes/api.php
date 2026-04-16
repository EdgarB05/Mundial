<?php

use App\Http\Controllers\BoletosController;
use App\Http\Controllers\TicketmasterController;
use Illuminate\Support\Facades\Route;

Route::get('/partidos', [TicketmasterController::class, 'partidos']);
Route::get('/boletos', [BoletosController::class, 'apiIndex']);
Route::post('/boletos', [BoletosController::class, 'apiStore']);
Route::get('/boletos/{boleto}', [BoletosController::class, 'apiShow']);
Route::put('/boletos/{boleto}', [BoletosController::class, 'apiUpdate']);
Route::patch('/boletos/{boleto}', [BoletosController::class, 'apiUpdate']);
Route::delete('/boletos/{boleto}', [BoletosController::class, 'apiDestroy']);