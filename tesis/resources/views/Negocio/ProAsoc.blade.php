@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="container">
        <table class="table table-striped mt-4">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre Producto</th>
                <th>Comercialización</th>
                <th>Costo Producto</th>
                <th>Precio Venta</th>
                <th>Cantidad Productos</th>
                <th>Precio Mes</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pro_has_op as $pro_op)
              <tr>
                <td>{{$pro_op->nombre_producto}}</td>
                <td>{{$pro_op->nombre_comercializacion}}</td>
                <td>{{$pro_op->costo_producto}}</td>
                <td>{{$pro_op->precio_ventaPro}}</td>
                <td>{{$pro_op->cantidad_productos}}</td>
                <td>{{$pro_op->precio_mes}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    @if ($_SESSION['nombre_rol'] == 'Administrador'|| $_SESSION['nombre_rol'] == 'Comercial' )
    <div class="d-flex justify-content-center">
      <div class="">
          <a href="/registroProducto" class="btn btn-dark btn-sm active center" role="button" aria-pressed="true">Crear Oportunidad Negocio</a>
      </div>
    </div>
    @include('sweetalert::alert')

    <script src="{{asset('js/eliminar_producto.js')}}"></script>
      
    @endif
    
@endsection