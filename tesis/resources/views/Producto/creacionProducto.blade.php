@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
<form action="" method="">
  <div class="row">
    <div class="form-group col-md-4">
      <label class="mb-1" for="inputEmail4">Nombre Producto</label>
      <input class="form-control" type="text" name="nombre_producto" id="nombre_producto">
    </div>
    <div class="form-group col-md-4">
      <label class="mb-1" for="inputPassword4">Tipo Producto</label>
      <select class=" custom-select form-control" name="tipoProducto" id="tipoProducto">}
        @foreach ($tipo_productos as $tipo_producto)
        <option value="">{{$tipo_producto->nombre_tipo_producto}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-md-4">
      <label class="mb-1" for="inputPassword4">Marca Producto</label>
      <select class="custom-select form-control" name="tipoProducto" id="tipoProducto">}
        @foreach ($macs as $mac)
        <option value="">{{$mac->nombre_marca}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="row mt-4">
    <div class="form-group col-md-6">
      <label class="mb-1" for="inputEmail4">Sku</label>
      <input class="form-control" type="text" name="sku" id="sku">
    </div>
    <div class="form-group col-md-6">
      <label class="mb-1" for="inputEmail4">Part-Number</label>
      <input class="form-control" type="text" name="partnumber" id="partnumber">
    </div>
  </div>
  <div class="row mt-4">
      <div class="form-group col-md-4">
        <label class="mb-1" for="inputEmail4">Descripcion</label>
        <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
      </div>
  </div>
  <div class="row">
    <div class="form-group row mt-3">
      <div class="col-md-12 offset-md-5">
          <button type="submit" class="btn btn-dark" >
              {{ __('Crear') }}
          </button>
      </div>
    </div>
  </div>

</form>
@endsection