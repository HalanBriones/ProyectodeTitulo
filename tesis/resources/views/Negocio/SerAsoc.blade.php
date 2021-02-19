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
                <th scope="col">Nombre Servicio</th>
                <th>Conocimiento</th>
                <th>Comercialización</th>
                <th>Costo Total Servicio</th>
                <th>Precio Total Venta</th>
                <th>Precio por Mes</th>
                <th>Costo por Mes</th>
                <th></th>
                @if ($_SESSION['nombre_rol'] == 'Tecnico')
                <th>Configuración</th>  
              @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($ser_has_op as $ser_op)
              <tr>
                <td>{{$ser_op->nombre_servicio}}</td>
                <td>{{$ser_op->nombre_conocimiento}}</td>
                <td>{{$ser_op->nombre_comercializacion}}</td>
                <td>{{$ser_op->valor_venta_mes}}</td>
                <td>{{$ser_op->costo_total_mes}}</td>
                <td>{{$ser_op->costo_totalSer}}</td>
                <td>{{$ser_op->valor_total_cliente}}</td>
                @if ($_SESSION['nombre_rol'] == 'Comercial' || $_SESSION['nombre_rol'] == 'Administrador')
                <td>
                  <a  class="btn btn-ligth" href="{{route('ser.edit',$ser_op->id_ser_has_op)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                  </svg></a>
                </td>  
              @endif
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            <div class="">
                <a href="{{route('añadirSer', $idNegocio)}}" class="btn btn-dark btn-sm active center" role="button" aria-pressed="true">Añadir</a>
            </div>
          </div>
    </div>
    @include('sweetalert::alert')
    <script src="{{asset('js/eliminar_producto.js')}}"></script>
      

    
@endsection