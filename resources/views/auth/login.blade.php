@extends('layouts.app')

@section('content')
    <h1>INICIO DE SESIÓN</h1>

    <form action="{{ route('acceso.store') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Correo" class="form-control" value="{{ old('email') }}" required>
        <br><br>
        <input type="password" name="password" placeholder="Contraseña" class="form-control" required>
        <br><br>

        <button type="submit" class="btn btn-success">Enviar</button>
    </form>
@endsection
