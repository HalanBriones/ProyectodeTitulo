@extends('layouts.plantilla')
@php
      if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="mb-1" for="compañia">Cliente</label>
                    <input disabled value="{{$compañia->compañia}}"  type="text" class="form-control" placeholder="Nombre del Cliente" name="compañia" id="compañia">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="mb-1" for="compañia">Dirección</label>
                    <input   type="text" class="form-control" placeholder="Dirección del Cliente o Compañia" name="direccion_compañia" id="direccion_compañia" value="{{$compañia->domicilio}}" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label class="mb-1" for="compañia">Correo</label>
                    <input   type="email" class="form-control" placeholder="Correo del Cliente o Compañia" name="correo_compañia" id="correo_compañia" value="{{$compañia->correo}}" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="mb-1" for="telefono_compañia">Teléfono</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">+569</div>
                        </div>
                        <input type="number" placeholder="Teléfono del cliente" class="form-control" name="telefono_compañia" id="telefono_compañia" value="{{$compañia->telefono}}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{asset('js/eliminar_producto.js')}}"></script>
      

    
@endsection