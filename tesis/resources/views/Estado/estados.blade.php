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
          <h3>Estados Oportunidades de Negocio</h3>
        </div>
        <div class="col">
          <a href="/comercializaciones-ser" class="btn btn-sm btn-dark" >Negocios</a>
        </div>
      </div>
        <table class="table mt-4" method="GET" action="/usuarios">
            <thead class="thead-light">
              <tr>
                <th>N°</th>
                <th scope="col">Nombre Estado</th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($estados as $estado)
              <tr>
                  <td class="scope">{{$i++}}</td>
                  <td class="scope">{{$estado->nombre_estado}}</td>
                @if ($_SESSION['nombre_rol'] == 'Administrador')
                <td><a  class="btn btn-light" href="{{route('estado.edit',$estado->idEstado)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg></a>
                </td>
                <td>
                <a class="btn btn-light" onclick="delete_estado({{$estado->idEstado}})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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
      <div class="mt-2 mb-5">
          <a href="/conocimiento" class="btn btn-dark btn-sm active center" role="button" aria-pressed="true">Crear Conocimientos</a>
      </div>
    </div>
    @endif

    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{asset('js/eliminar_producto.js')}}"></script>
@endsection