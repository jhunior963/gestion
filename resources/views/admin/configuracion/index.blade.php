@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Datos del sistema</h1>
@stop

@section('content')
    <p>Bienvenido a la seccion de configuracion del sistema</p>
  <div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Bienbenido a la seccion de configuracion del sistema</h3>
        </div>
        <!-- /.card-header -->
         <div class="card-body">
            <form action="{{ route('admin.configuracion.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                                <label for="">Logo de la institucion</label>

                                    <input type="file" class="form-control" 
                                    value="{{ old('logo', $configuracion->logo ?? '') }}" name="logo" 
                                    placeholder="Escribir aqui...." onchange="mostrarImagen(event)" accept="image/*">
                                    <br>
                                    <center>
                                        <img id="preview" src="{{ url($configuracion->logo) }}" style="max-width: 300px; margin-top: 10px;">
                                    </center>
                                
                                @error('logo')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                            <script>
                                const mostrarImagen = e =>
                                document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                            </script>
                    </div>
                    <div class="col-md-8">
                      <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre </label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-university"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ old('nombre', $configuracion->nombre ?? '') }}" name="nombre" placeholder="Escribir aqui...." required>
                                </div>
                                @error('nombre')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                               <div class="form-group">
                                <label for="descripcion">Descripcion </label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ old('descripcion', $configuracion->descripcion ?? '') }}" name="descripcion" placeholder="Escribir aqui...." required>
                                </div>
                                @error('descripcion')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                      </div>
                       <div class="row">
                        <div class="col-md-6">
                               <div class="form-group">
                                <label for="direccion">Direccion </label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ old('direccion', $configuracion->direccion ?? '') }}" name="direccion" placeholder="Escribir aqui...." required>
                                </div>
                                @error('direccion')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                               <div class="form-group">
                                <label for="telefono">Telefono </label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ old('telefono', $configuracion->telefono ?? '') }}" name="telefono" placeholder="Escribir aqui...." required>
                                </div>
                                @error('telefono')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                          <div class="col-md-3">
                               <div class="form-group">
                                <label for="divisa">Divisa </label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                    </div>
                                    <select name="divisa" id="" class="form-control" required>
                                        <option value="Seleccione un opcion"></option>
                                        @foreach ($divisas as $divisa)
                                            <option value="{{ $divisa['symbol'] }}" {{ old('divisa', $configuracion->divisa ?? '') == $divisa['symbol'] ? 'selected' : '' }}>
                                                {{ $divisa['name']." (". $divisa['symbol']." )" }}
                                            </option>
                                        @endforeach
                                    </select>
                                  </div>
                                @error('divisa')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                       </div>
                       <div class="row">
                         <div class="col-md-6">
                               <div class="form-group">
                                <label for="">correo Electronico </label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" value="{{ old('correo_electronico', $configuracion->correo_electronico ?? '') }}" name="correo_electronico" placeholder="Escribir aqui...." required>
                                </div>
                                @error('correo_electronico')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                               <div class="form-group">
                                <label for="">Web </label><b>(*)</b>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                    </div>
                                    <input type="url" class="form-control" value="{{ old('web', $configuracion->web ?? '') }}" name="web" placeholder="https://example.com" required>
                                </div>
                                @error('web')
                                <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                       </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                        <div class="col-md-12">
                               <div class="form-group">
                                <a href="{{ url('/admin') }}" class="btn btn-primary"><i 
                                class="fas fa-arrow-left"></i>Cancelar</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Guardar</button>
                            
                            </div>
                        </div>
                    </div>
            </form>

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
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop