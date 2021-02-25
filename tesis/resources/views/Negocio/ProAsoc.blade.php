@extends('layouts.plantilla')
@php
      if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
    <div class="container">
        <table class="table mt-4">
            <thead class="thead-light">
              <tr>
                <input type="hidden" value="{{$idNegocio}}">
                <th scope="col">Nombre Producto</th>
                <th>Comercialización</th>
                <th>Costo Producto</th>
                <th>Precio Venta</th>
                <th>Cantidad Productos</th>
                <th>Precio Mes</th>
                <th></th>
                <th></th>
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
                <td><a class="btn btn-light" href="{{route('viewPro',$pro_op->id_pro_has_op)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg></a></td>
                <td>
                  <a class="btn btn-light" onclick="deleteProducto({{$pro_op->id_pro_has_op}},{{$idNegocio}})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                  </svg></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    @if ($_SESSION['nombre_rol'] == 'Administrador'|| $_SESSION['nombre_rol'] == 'Comercial' )
    <div class="d-flex justify-content-center">
      <div class="">
          <a href="{{route('añadirPro', $idNegocio)}}" class="btn btn-dark btn-sm active center" role="button" aria-pressed="true">Añadir</a>
      </div>
    </div>
    @endif
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{asset('js/eliminar_producto.js')}}"></script>
      

    
@endsection