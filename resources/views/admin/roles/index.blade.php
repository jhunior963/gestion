@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de roles</b></h1>
@stop

@section('content')
    
  <div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Roles registrados</h3>

                <div class="card-tools">
                    <a href="{{ url('/admin/roles/create') }}" class="btn btn-primary">Crear nuevo rol</a>
                
                </div>
            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Nombre de rol</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $rol)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td>{{ $rol->name }}</td>
                                <td>
                                   <div class="row d-flex justify-content-center">
                                     <a href="{{ url('/admin/roles/'.$rol->id.'/edit') }}" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i>Editar</a>
                                   <form action="{{ url('/admin/roles/'.$rol->id) }}" method="post" id="miFormulario{{ $rol->id }}">
                                    @csrf
                                    @method('DELETE')
                                       <button type="submit" class="btn btn-danger btn-sm" onclick="preguntar(event)">
                                         <i class="fas fa-trash"></i> Eliminar
                                       </button>
                                    </form>
                                   </div>
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
                                        denyButtonText: 'Cancelar',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // JavaScript puro para enviar el formulario
                                            document.getElementById('miFormulario{{ $rol->id }}').submit();
                                        }
                                    });
                                }
                            </script>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>

        </div>
    </div>
  </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
   
@stop