@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="container">
        <table class="table table-striped mt-4">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre Servicio</th>
                <th>Conocimiento</th>
                <th>Comercialización</th>
                <th>Costo Total Servicio</th>
                <th>Precio Total Venta</th>
                <th>Precio por Mes</th>
                <th>Costo por Mes</th>
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
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    @include('sweetalert::alert')
    <script src="{{asset('js/eliminar_producto.js')}}"></script>
      

    
@endsection