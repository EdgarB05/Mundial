<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra boleto</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')

    <h1>COMPRA DE BOLETO</h1>
    <!-- TODO: poner ACTION -->
    <form action="{{ route('boletos.store') }}" method="POST">

        <!-- Proteccion de laravel para usar un formulario. OBLIGATORIO --> 
        @csrf
         <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-users"></i> </span>
            <input type="text" name="equipos" placeholder="Equipos" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-futbol"></i> </span>
            <input type="text" name="estadio" placeholder="Estadio" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-calendar"></i> </span>
            <input type="date" name="fecha" placeholder="Fecha" class="form-control">
        </div>
        
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-clock"></i> </span>
            <input type="time" name="hora" placeholder="Hora" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fa-brands fa-cc-diners-club"></i> </span>
            <input type="number" name="zona" placeholder="Zona" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-table-cells-large"></i> </span>
            <input type="number" name="fila" placeholder="Fila" class="form-control">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"> <i class="fa-solid fa-chair"></i> </span>
            <input type="number" name="asiento" placeholder="Asiento" class="form-control">
        </div>


        <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
    </form>
    @endsection
</body>
</html>