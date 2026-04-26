@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Bienvenido al panel de control.</p>
@stop

@section('css')
    {{-- Agrega aquí estilos adicionales si los necesitas --}}
@stop

@section('js')
    <script> console.log('Dashboard cargado'); </script>
@stop
