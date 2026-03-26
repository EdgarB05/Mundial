@extends('layouts.app')

@section('content')
    <h1>Panel administrador</h1>
    <p>Bienvenido, {{ auth()->user()->name }}. Esta sección es exclusiva para usuarios con rol <strong>admin</strong>.</p>
@endsection
