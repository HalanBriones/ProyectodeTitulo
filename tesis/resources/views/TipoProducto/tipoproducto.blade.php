@extends('layouts.plantilla')
@php
      if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
    <div class="card">
        <div class="card-header">{{ __('Registro Tipo Producto') }}</div>
        <div class="card-body">
            <form method="Post" action="{{route('tipoProducto.store')}}">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="mt-5 col-md-4 d-flex flex-column justify-content-center">
                        <div class="form-group">
                            <label for="">Nombre Tipo Producto</label>
                            <input class="form-control" type="text" name="tipo_producto">
                            </div>
                    </div>
                    <div class="mt-5 col-md-5">
                        <label class="mb-3">Asociar comercializaciones para el tipo producto</label>
                        <div class="d-flex justify-content-center">
                            <div class="check-group">
                                @foreach($comercializaciones as $comercializacion)
                                <input type="checkbox"  class=" ml-2 form-check-input" name="comercializaciones[]" value={{ $comercializacion->idcomercializacion_producto }}> {{ $comercializacion->nombre_comercializacion }}<br>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="mt-4 mb-4 col d-flex justify-content-center">
                        <button class="btn btn-dark" type="submit">Crear</button>
                    </div>
                </div>
            </form>
        </div>    
        @include('sweetalert::alert')
    </div>
    
@endsection