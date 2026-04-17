<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoletosController;
use App\Http\Controllers\TicketmasterController;
use App\Http\Controllers\VoluntariadoController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/registro', [AuthController::class, 'registerForm'])->name('registro');
Route::post('/registro', [AuthController::class, 'register'])->name('registro.store');

Route::get('/acceso', [AuthController::class, 'loginForm'])->name('acceso');
Route::post('/acceso', [AuthController::class, 'login'])->name('acceso.store');
Route::post('/cerrar', [AuthController::class, 'logout'])->name('cerrar');

Route::middleware(['auth'])->group(function () {
    Route::resource('boletos', BoletosController::class);
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', [AuthController::class, 'adminDashboard'])->name('admin-dashboard');
    
    Route::get('/voluntariado', [VoluntariadoController::class, 'index'])->name('voluntariado.index');
    Route::get('/voluntariado/{voluntariado}/edit', [VoluntariadoController::class, 'edit'])->name('voluntariado.edit');
    Route::put('/voluntariado/{voluntariado}', [VoluntariadoController::class, 'update'])->name('voluntariado.update');
    Route::delete('/voluntariado/{voluntariado}', [VoluntariadoController::class, 'destroy'])->name('voluntariado.destroy');
    Route::patch('/voluntariado/{voluntariado}/asistencia', [VoluntariadoController::class, 'marcarAsistencia'])->name('voluntariado.asistencia');
});

Route::middleware(['auth', 'role:empleado'])->group(function () {
    Route::get('/empleado-dashboard', [AuthController::class, 'empleadoDashboard'])
        ->name('empleado-dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/usuarios/{user}/editar', [AuthController::class, 'editUser'])->name('usuarios.edit');
    Route::put('/usuarios/{user}', [AuthController::class, 'updateUser'])->name('usuarios.update');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::delete('/usuarios/{user}', [AuthController::class, 'destroyUser'])->name('usuarios.destroy');
});

Route::resource('voluntariado', VoluntariadoController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

Route::get('/voluntariado/create', [VoluntariadoController::class, 'create'])->name('voluntariado.create');
Route::post('/voluntariado', [VoluntariadoController::class, 'store'])->name('voluntariado.store');