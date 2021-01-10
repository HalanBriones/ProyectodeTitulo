@extends('layouts.plantilla')
@php
    session_start(['name' =>'Login']);
@endphp
@section('content')
<main>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Creación Producto') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('producto.registrar')}}">
                            @csrf
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label text-md-right" for="">Nombre Producto</label>
                              <div class="col-md-6">
                                <input id="nombre_producto" type="text" class="form-control @error('nombre_producto') is-invalid @enderror" name="nombre_producto" value="{{ old('nombre_producto') }}" required autocomplete="nombre_producto" autofocus>
                                @error('nombre_producto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            <div class="form-group row mt-3">
                              <label class="col-md-4 col-form-label text-md-right" for="">Tipo Producto</label>
                              <div class="col-md-6">
                                <select class="form-control" name="tipo_producto" id="tipo_producto">
                                  <option value="" selected>Seleccione tipo producto</option>
                                  @foreach ($tipo_productos as $tipo_producto)
                                     <option value="{{$tipo_producto->idtipo_producto}}">{{$tipo_producto->nombre_tipo_producto}}</option>   
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="form-group row mt-3">
                              <label class="col-md-4 col-form-label text-md-right" for="">Marca Producto</label>
                              <div class="col-md-6">
                                <select class="form-control" name="marca" id="marca">
                                  <option value="" selected>Seleccione marca</option>
                                  @foreach ($macs as $mac)
                                     <option value="{{$mac->idMac}}">{{$mac->nombre_marca}}</option>   
                                  @endforeach
                                </select>
                              </div>
                            </div>

                            <div class="form-group row mt-3">
                              <label class="col-md-4 col-form-label text-md-right" for="">Descripción</label>
                              <div class="col-md-6">
                                <textarea class="form-control" name="descripcion" id="descripcion" cols="20" rows="10"></textarea>
                              </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark" >
                                        {{ __('Crear') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    </main>
    <script src="{{ asset('js/validacion_email.js') }}"></script>
    <script src="{{ asset('js/validar_password.js') }}"></script>


@endsection