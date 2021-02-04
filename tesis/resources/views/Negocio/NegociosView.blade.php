@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="container">
        <table class="table table-striped mt-4" method="GET" action="/verNegocios">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre Negocio</th>
                <th scope="col">Fecha Creación</th>
                <th scope="col">Estado</th>
                <th scope="col">Productos Asociados</th>
                <th scope="col">Servicios Asociados</th>
                <th scope="col">Participantes Asociados</th>

              </tr>
            </thead>
            <tbody>
              @foreach ($negocios as $negocio)
              <tr>
                <td>{{$negocio->nombre_negocio}}</td>
                <td>{{$negocio->fecha_creacion}}</td>
                <td>{{$negocio->estado->nombre_estado}}</td>
                <td><a style="text-decoration: none" class="badge-light" href="{{route('negocio.proAsoc',['idNegocio' => $negocio->idNegocio])}}">Ver Productos</a></td>
                <td><a style="text-decoration: none" class="badge-light" href="{{route('negocio.serAsoc',['idNegocio' => $negocio->idNegocio])}}">Ver Servicios</a></td>
                <td><a style="text-decoration: none" class="badge-light" href="{{route('negocio.partAsoc',['idNegocio' => $negocio->idNegocio])}}">Ver Participantes</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    @include('sweetalert::alert')
    <script src="{{asset('js/eliminar_producto.js')}}"></script> 
@endsection