<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoletosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registro', [AuthController::class, 'registerForm'])->name('registro');
Route::post('/registro', [AuthController::class, 'register'])->name('registro.store');

Route::get('/acceso', [AuthController::class, 'loginForm'])->name('acceso');
Route::post('/acceso', [AuthController::class, 'login'])->name('acceso.store');
Route::post('/cerrar', [AuthController::class, 'logout'])->name('cerrar');

Route::middleware(['auth'])->group(function () {
    Route::resource('boletos', BoletosController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', [AuthController::class, 'adminDashboard'])
        ->name('admin-dashboard');
});

Route::middleware(['auth', 'role:empleado'])->group(function () {
    Route::get('/empleado-dashboard', [AuthController::class, 'empleadoDashboard'])
        ->name('empleado-dashboard');
});
