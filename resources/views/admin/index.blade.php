@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Bienvenido: </b>{{ Auth::user()->name}}</h1>
    <hr>
@stop

@section('content')
  <div class="row">
    <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box zoom">
            <img src="{{ url('/img/colegio.gif') }}" width="70px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Gestiones registradas</b></span>
                <span class="info-box-number" style="color: blue; font-size: 15pt;">{{ $total_gestiones }} gestiones</span>
            </div>
        </div>
    </div>

     <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box zoom">
            <img src="{{ url('/img/calendario.gif') }}" width="70px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Periodos registradas</b></span>
                <span class="info-box-number" style="color: blue; font-size: 15pt;">{{ $total_periodos }} periodos</span>
            </div>
        </div>
    </div>

     <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box zoom">
            <img src="{{ url('/img/lista.gif') }}" width="70px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Niveles registrados</b></span>
                <span class="info-box-number" style="color: blue; font-size: 15pt;">{{ $total_niveles }} niveles</span>
            </div>
        </div>
</div>

     <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box zoom">
            <img src="{{ url('/img/cliente.gif') }}" width="70px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Grados registrados</b></span>
                <span class="info-box-number" style="color: blue; font-size: 15pt;">{{ $total_grados }} grados</span>
            </div>
        </div>
    </div>

     <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box zoom">
            <img src="{{ url('/img/velocidad.gif') }}" width="70px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Paralelos registrados</b></span>
                <span class="info-box-number" style="color: blue; font-size: 15pt;">{{ $total_paralelos }} paralelos</span>
            </div>
        </div>
    </div>

     <div class="col-md-4 col-sm-6 col-12">
        <div class="info-box zoom">
            <img src="{{ url('/img/reloj.gif') }}" width="70px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Turnos registrados</b></span>
                <span class="info-box-number" style="color: blue; font-size: 15pt;">{{ $total_turnos }} turnos</span>
            </div>
        </div>
    </div>

        <div class="col-md-4 col-sm-6 col-12">
            <div class="info-box zoom">
                <img src="{{ url('/img/libro.gif') }}" width="70px" alt="">
                <div class="info-box-content">
                    <span class="info-box-text"><b>Materias registradas</b></span>
                    <span class="info-box-number" style="color: blue; font-size: 15pt;">{{ $total_materias }} materias</span>
                </div>
            </div>
        </div>

@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop