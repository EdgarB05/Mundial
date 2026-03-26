@extends('layouts.app')

@section('content')
    <h1>Panel empleado</h1>
    <p>Bienvenido, {{ auth()->user()->name }}. Esta sección es exclusiva para usuarios con rol <strong>empleado</strong>.</p>
@endsection
