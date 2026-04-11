@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de gestiones educativas</b></h1>
    <hr>
    <a href="{{ route('admin.gestiones.create') }}" class="btn btn-primary">Crear nueva gestion</a>
    
@stop

@section('content')
  <div class="row">
    @foreach ($gestiones as $gestion)
        <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box zoomP">
            <img src="{{ url('/img/colegio.gif') }}" width="90px" alt="">
            <div class="info-box-content">
                <span class="info-box-text"><b>Gestiones Educativa</b></span>
                <span class="info-box-number" style="color: rgb(12, 133, 247); font-size: 20pt;">{{ $gestion->nombre }}</span>
                <div class="row">
                    <a href="{{ route('admin.gestiones.edit', $gestion->id) }}" class="btn btn-success"><i class="fas fa-pencil-alt"></i>Editar</a>
                    <form action="{{ route('admin.gestiones.destroy', $gestion->id) }}" method="post" id="miformulario{{ $gestion->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="preguntar(event)">
                            <i class="fas fa-trash"></i>Eliminar
                        </button>
                    </form>
                     <script>
                     function preguntar(event) {
                        event.preventDefault();

                        Swal.fire({
                             title: '¿Desea eliminar este registro?',
                             text: '',
                             icon: 'question',
                             showDenyButton: true,
                             confirmButtonText: 'Eliminar',
                             confirmButtonColor: '#a5161d',
                             denyButtonColor: '#270a0a',
                             denyButtonText: 'Cancelar'
                             }).then((result) => {
                             if (result.isConfirmed) {
                                 // JavaScript puro para enviar el formulario
                             document.getElementById('miformulario{{ $gestion->id }}').submit();
                         }
                        });
                      }
                    </script>
                </div>

            </div>

        </div>
    </div>
    @endforeach
    
  </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   
@stop