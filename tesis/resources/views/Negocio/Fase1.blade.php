@extends('layouts.plantilla')
@php
      if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div><p>Creacion Negocio</p></div>
            <div><p>Fase 1</p></div>
        </div>
        <div class="card-body">
            <form action="{{route('negociof1.store')}}" method="POST">
                @csrf
                {{-- datos negocio --}}
                <div class="row">
                    <div class="col ">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="nombre_negocio">Nombre Negocio</label>
                            <input   type="text" class="form-control" placeholder="Nombre Negocio" name="nombre_negocio" id="nombre_negocio" required>
                        </div>
                    </div>
                    {{-- derecha --}}
                    <div class="col">
                    <div class="form-group mb-2">
                        <label class="mb-1" for="">Descripción</label>
                        <textarea  class="form-control" name="descripcion" id="descripcion" cols="6" rows="5"></textarea>
                    </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="compañia">Cliente</label>
                            <input   type="text" class="form-control" placeholder="Nombre del Cliente" name="compañia" id="compañia" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="compañia">Dirección</label>
                            <input   type="text" class="form-control" placeholder="Dirección del Cliente o Compañia" name="direccion_compañia" id="direccion_compañia" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="compañia">Correo</label>
                            <input   type="email" class="form-control" placeholder="Correo del Cliente o Compañia" name="correo_compañia" id="correo_compañia" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="mb-1" for="telefono_compañia">Teléfono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <div class="input-group-text">+569</div>
                                </div>
                                <input type="number" placeholder="Teléfono del cliente" class="form-control" name="telefono_compañia" id="telefono">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-dark" type="submit">Siguiente</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{'js/negocio.js'}}"></script>
    <script src="{{'js/comercializacion.js'}}"></script>
    <script src="{{asset('js/telefono.js')}}"></script>
@endsection