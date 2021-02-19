@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="container">
        <table class="table table-striped mt-4">
            <thead class="thead-dark">
              <tr>
                <input type="hidden" value="{{$idNegocio}}">
                <th scope="col">Nombre Producto</th>
                <th>Comercialización</th>
                <th>Costo Producto</th>
                <th>Precio Venta</th>
                <th>Cantidad Productos</th>
                <th>Precio Mes</th>
                <th></th>
                @if ($_SESSION['nombre_rol'] == 'Tecnico')
                  <th>Configuración</th>  
                @endif
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
                @if ($_SESSION['nombre_rol'] == 'Comercial' || $_SESSION['nombre_rol'] == 'Administrador')
                  <td>
                    <a  class="btn btn-ligth" href="{{route('pro.edit',$pro_op->id_pro_has_op)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg></a>
                  </td>  
                @endif
                @if ($_SESSION['nombre_rol'] == 'Tecnico')
                  <td><a href="" class="btn btn-sm btn-ligth"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                  </svg>Configuración</a></td>  
                @endif
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

    <script src="{{asset('js/eliminar_producto.js')}}"></script>
      

    
@endsection