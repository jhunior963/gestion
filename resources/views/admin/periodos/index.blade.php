@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de periodos academicos</b></h1>
@stop

@section('content')
    
  <div class="row">
    <div class="col-md-6">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Periodos registrados</h3>

                <div class="card-tools">
                      <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalCreate">
                      Crear nuevo periodo
                    </button>

                 <!-- Modal -->
                <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog">
                      <div class="modal-content">
                         <div class="modal-header" style="background-color: #007bff; color: white;">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de un nuevo periodo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form action="{{ url('admin/periodos/create') }}" method="POST">
                              @csrf
                              <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nombre">Gestiones</label><b>(*)</b>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                </div>
                                                <select  class="form-control" name="gestion_id_create" id="gestion_id_create" required>
                                                    <option value="">Seleccione una gestion</option>
                                                    @foreach ($gestiones as $gestion)
                                                        <option value="{{ $gestion->id }}">
                                                            {{ $gestion->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('gestion_id-create')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nombre">Nombre del periodo</label><b>(*)</b>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="nombre_create"
                                                 value="{{ old('nombre_create') }}" 
                                                 placeholder="Escriba aqui..." required>
                                            </div>
                                            @error('nombre_create')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <button type="button" class="btn btn-secondary" 
                                    data-bs-dismiss="modal">Cancelar</button>
                           <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                           </form>
                        </div>
                     </div>
                   </div>
                </div>


                </div>

            </div>
            <div class="card-body">
                <table id="example" class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Nro</th>
                            <th>Gestion</th>
                            <th>Periodos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($gestiones as $gestion)
                            <tr>
                                <td style="text-align: center">{{ $loop->iteration }}</td>
                                <td>{{ $gestion->nombre }}</td>
                                <td>
                                    @foreach ($gestion->periodos as $periodo)
                                        <button class="btn btn-info btn-sm btn-block">{{ $periodo->nombre }}</button>
                                    @endforeach
                                </td>
                                <td>
                                  @foreach ($gestion->periodos as $periodo)
                                       <div class="row d-flex justify-content-center">
                                        <!-- Modal de edicion-->
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" 
                                    data-target="#ModalUpdate{{ $periodo->id }}">
                                      <i class="fas fa-pencil-alt"></i>Editar
                                     </button>

                                     <form action="{{ url('/admin/periodos/destroy', $periodo->id) }}" method="post" 
                                     id="miformulario{{ $periodo->id }}">
                                        @csrf
                                        @method('DELETE')
                                     <button type="submit" class="btn btn-danger btn-sm" onclick="preguntar(event)">
                                         <i class="fas fa-trash"></i>Eliminar
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
                             denyButtonText: 'Cancelar'
                             }).then((result) => {
                             if (result.isConfirmed) {
                                 // JavaScript puro para enviar el formulario
                             document.getElementById('miformulario{{ $periodo->id }}').submit();
                         }
                        });
                      }
                    </script>

                         <div class="modal fade" id="ModalUpdate{{ $periodo->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                   <div class="modal-dialog">
                      <div class="modal-content">
                         <div class="modal-header" style="background-color: #08a35b; color: white;">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Editar periodo</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           <form action="{{ url('admin/periodos/' . $periodo->id) }}" method="POST">
                              @csrf
                              @method('PUT')
                               <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nombre">Gestiones</label><b>(*)</b>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                </div>
                                                <select  class="form-control" name="gestion_id" id="gestion_id" required>
                                                    <option value="">Seleccione una gestion</option>
                                                    @foreach ($gestiones as $gestion)
                                                        <option value="{{ $gestion->id }}" {{ $gestion->id == $periodo->gestion_id ? 'selected' : '' }}>
                                                            {{ $gestion->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('gestion_create')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                              <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="nombre">Nombre del periodo</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $periodo->nombre) }}" placeholder="Escriba aqui..." required>
                                            </div>
                                            @error('nombre')
                                            <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <button type="button" class="btn btn-secondary" 
                                    data-bs-dismiss="modal">Cancelar</button>
                           <button type="submit" class="btn btn-success">Actualizar</button>
                                </div>
                           </form>
                        </div>
                            

                     </div>
                   </div>
                </div>
                                    @endforeach
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
    @if ($errors->any())
        @php
            $modalToShow = session('modal_id') ? 'ModalUpdate' . session('modal_id') : 'ModalCreate';
        @endphp
        <script>
            $(document).ready(function() {
                $('#{{ $modalToShow }}').modal('show');
            });
        </script>
        
    @endif
@stop