@extends('layouts.plantilla')
@php
  if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
    <div class="container">
      <form method="GET" action="/servicios/busqueda">
        <div class="row">
          <div class="col-4">
            <a href="/conocimientos" class="btn btn-dark btn-sm">Conocimiento</a>
            <a href="/comercializaciones-ser" class="btn btn-dark btn-sm">Comercialización</a>
          </div>
          <div class="col">
            <div class="row">
              <div class="col"><input class="form-control"type="search" name="nombre_servicio" placeholder="Servicio"></div>
              <div class="col"><input class="form-control"type="search" name="chile_compra" placeholder="ID Chile Compra"></div>
              <div class="col"><button class="btn btn-sm btn-dark" type="submit">Buscar</button></div>
              
            </div>
          </div>
        </div>
      </form>
        <table class="table mt-4" method="GET" action="/usuarios">
            <thead class="thead-light">
              <tr>
                <th>IDChileCompra</th>
                <th>Sigla del servicio</th>
                <th scope="col">Nombre del Servicio</th>
                <th scope="col">Descripción</th>
                <th></th> 
                <th></th>

              </tr>
            </thead>
            <tbody>
              @foreach ($servicios as $servicio)
              <tr>
                <td>{{ $servicio->idChileCompra }}</td>
                <td>{{$servicio->sigla_servicio}}</td>
                <td>{{ $servicio->nombre_servicio }}</td>
                <td>{{ $servicio->descripcion }}</td>
                @if ($_SESSION['nombre_rol'] == 'Administrador')
                <td><a  class="btn btn-light" href="{{route('servicio.edit',$servicio->idservicio)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg></a>
                </td>
                <td>
                  <a class="btn btn-ligth" onclick="delete_servicio({{$servicio->idservicio}})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                  </svg></a>
                  </td>
                @endif
              </tr>
              @endforeach

            </tbody>
          </table>
    </div>
    @if ($_SESSION['nombre_rol'] == 'Administrador')
    <div class="d-flex justify-content-center">
      <div class="">
          <a href="/registroServicio" class="btn btn-dark btn-sm active center" role="button" aria-pressed="true">Crear Servicio</a>
      </div>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{asset('js/eliminar_producto.js')}}"></script>
      
    @endif
    
@endsection