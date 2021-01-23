@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="container">
       {{-- TIPO PRODUCTO CON COMERCIALIZACIONES CORRESPONDIENTES --}}
        <form method="Post" action="{{route('tipoProducto.store')}}">
            @csrf
            <div class="d-flex justify-content-center">
                <h5>Tipo Producto</h5>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="mt-5 col-md-4 d-flex flex-column justify-content-center">
                    <div class="form-group">
                        <label for="">Nombre Tipo Producto</label>
                        <input class="form-control" type="text" name="tipo_producto">
                        </div>
                </div>
                <div class="mt-5 col-md-5">
                    <label class="mb-3">Escoger tipo de comercializaciones para el tipo producto</label>
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

    <form method="POST" class="mb-4 mt-3" action="{{route('comercializacion.store')}}">
        @csrf
        <div class="d-flex justify-content-center">
            <h5>Creación Comercialización</h5>
        </div>
        <div class="row d-flex justify-content-left">
            <div class="mt-5 col-md-4 ">
                <div class="form-group">
                    <label for="">Nombre Comercialización</label>
                    <input class="form-control" type="text" name="comercializacion_pro">
                </div>
            </div>
            <div class=" mt-5 mb-5 col-md ">
                <div class="form-group">
                    <button class="mt-4 btn btn-dark" type="submit">Crear</button>
                </div>
            </div>
        </div>
   </form>
   @include('sweetalert::alert')
</div>
    
@endsection