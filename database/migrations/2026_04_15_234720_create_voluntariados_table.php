<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voluntariados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('telefono');
            $table->enum('tipo', ['voluntario', 'staff']);
            $table->string('idiomas')->nullable();
            $table->text('habilidades')->nullable();
            $table->string('turno')->nullable();
            $table->string('zona')->nullable();
            $table->boolean('asistencia')->default(false);
            $table->timestamp('fecha_asistencia')->nullable();
            $table->enum('estado', ['activo', 'baja'])->default('activo');
            $table->text('motivo_baja')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voluntariados');
    }
};
