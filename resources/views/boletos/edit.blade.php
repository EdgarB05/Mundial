<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')

    
    <h1> EDITAR BOLETO: {{ $boleto -> equipos }}</h1>

    <form action=" {{ route('boletos.update', $boleto) }}" method="POST">
        <!-- Uso obligatorio para la actualizacion -->
        @csrf
        @method('PUT')

        <input type="text" name="equipos" value="{{ $boleto -> equipos}}" placeholder="Equipos" class="form-control">
        <br>
        <input type="text" name="estadio" value="{{ $boleto -> estadio}}" placeholder="Estadio" class="form-control"> 
        <br>
        <input type="date" name="fecha" value="{{ $boleto -> fecha}}" placeholder="Fecha" class="form-control">
        <br>
        <input type="time" name="hora" value="{{ $boleto -> hora}}" placeholder="Hora" class="form-control">
        <br>
        <input type="number" name="zona" value="{{ $boleto -> zona}}" placeholder="Zona" class="form-control">
        <br>
        <input type="number" name="fila" value="{{ $boleto -> fila}}" placeholder="Fila" class="form-control">
        <br>
        <input type="number" name="asiento" value="{{ $boleto -> asiento}}" placeholder="Asiento" class="form-control">
        <br>


        <button type="submit" class="btn btn-success">Guardar</button>
    </form>

    <div class="d-flex justify-content-end">
        <a href="{{ route('boletos.index') }}" class="btn btn-danger">
            Volver
        </a>
    </div>
    @endsection
    
</body>
</html>