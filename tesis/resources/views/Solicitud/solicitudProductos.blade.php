@extends('layouts.plantilla')
@php
      if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
    <div class="container">
      <div class="row">
          <h3 class="text-center" >Solicitudes</h3>
      </div>
        <table class="table mt-4" method="GET" action="/usuarios">
            <thead class="thead-dark">
              <tr>
                <th>Producto</th>
                <th>Modelo/Versión</th>
                <th>Tipo Producto</th>
                <th>Marca</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($productos as $pro)
                    <tr>
                        <td>{{$pro->nombre_producto}}</td>
                        @if (empty($pro->modelo))
                            <td>{{$pro->version}}</td>
                        @endif
                        @if (empty($pro->version))
                        <td>{{$pro->modelo}}</td>
                    @endif
                        <td>{{$pro->nombre_tipo_producto}}</td>
                        <td>{{$pro->nombre_marca}}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          <div class="row">
              <div class="col-3">
                <a class="btn btn-sm btn-dark" href="/solicitudes">Atras</a>
              </div>
          </div>
    </div>
    @include('sweetalert::alert')

    <script src="{{asset('js/eliminar_producto.js')}}"></script>
      

    
@endsection