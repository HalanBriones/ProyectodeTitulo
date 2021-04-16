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
                <th>Servicio</th>
                <th>ID Chile Compra</th>
                <th>Conocimiento</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($servicios as $ser)
                    <tr>
                        <td>{{$ser->nombre_servicio}}</td>
                        <td>{{$ser->idChileCompra}}</td>
                        <td>{{$ser->conocimiento}}</td>
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