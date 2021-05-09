@extends('layouts.plantilla')
@php
      if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
    <div class="container">
      <div class="row mt-3 d-flex justify-content-between">
        <div class="col">
          <h3>Marcas</h3>
        </div>
        <div class="col-7">
          <form method="GET" action="/busqueda/marca">
            @csrf
          <div class="row">
            <div class="col">
              <a href="/tipo-productos" class="btn btn-sm  btn-dark" >Tipo Producto</a>
            </div>
            <div class="col">
              <a href="/comercializaciones" class="btn btn-sm btn-dark" >Comercialización</a>
            </div>
              <div class="col">
                <input class="form-control" placeholder="Nombre" type="search" name="nombre_marca">
              </div>
              <div class="col">
                <button type="submit" class="btn btn-dark btn-sm">Buscar</button>
              </div>
          </div>
        </form>
        </div>
      </div>
        <table class="table mt-4" method="GET">
            <thead class="thead-light">
              <tr>
                <th scope="col">N°</th>
                <th scope="col">Nombre de la Marca</th>
                <th>Editar</th>
                <th>Eliminar</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($marcas as $marca)
              <tr>
                <td>{{ $i++}}</td>
                <td>{{ $marca->nombre_marca }}</td>
                @if ($_SESSION['nombre_rol'] == 'Administrador' ||  $_SESSION['nombre_rol'] == 'Comercial')
                <td><a  class="btn btn-light" href="{{route('marca.edit',$marca->idMac)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg></a>
                </td>
                <td>
                  <a class="btn btn-light" onclick="delete_marca({{$marca->idMac}})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
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
          <a href="/marca" class="btn btn-dark btn-sm active center" role="button" aria-pressed="true">Crear Marca</a>
      </div>
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{asset('js/eliminar_producto.js')}}"></script>
      
    @endif
    
@endsection