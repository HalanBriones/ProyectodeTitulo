@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="container">
      <form method="GET" action="/servicios/busqueda">
        <div class="row">
          <div class="col-4">
            <a href="/conocimiento" class="btn btn-dark btn-sm">Conocimiento</a>
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
            <thead class="thead-dark">
              <tr>
                <th>IDChileCompra</th>
                <th scope="col">Nombre Servicio</th>
                <th scope="col">Descripción</th>
                <th></th>

              </tr>
            </thead>
            <tbody>
              @foreach ($servicios as $servicio)
              <tr>
                <td>{{ $servicio->idChileCompra }}</td>
                <td>{{ $servicio->nombre_servicio }}</td>
                <td>{{ $servicio->descripcion }}</td>
                @if ($_SESSION['nombre_rol'] == 'Administrador')
                <td><a  class="btn btn-dark" href="{{route('servicio.edit',$servicio->idservicio)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
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

      
    @endif
    
@endsection