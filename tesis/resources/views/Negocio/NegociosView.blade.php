@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="container">
      <div class="row mt-3 ">
        <div class="col d-flex justify-content-start">
          <h3>Oportunidades de Negocio</h3>
        </div>
        <div class="col d-flex justify-content-end">
          <a href="/estado/store" class="btn btn-sm btn-dark" >Estado</a>
        </div>
      </div>
        <table class="table table-striped mt-4" method="GET" action="/verNegocios">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre Negocio</th>
                <th scope="col">Fecha Creación</th>
                <th scope="col">Estado</th>
                <th scope="col">Productos Asociados</th>
                <th scope="col">Servicios Asociados</th>
                <th scope="col">Participantes Asociados</th>
                <th scope="col">Documentos</th>
                @if ($_SESSION['nombre_rol'] == 'Administrador' || $_SESSION['nombre_rol'] == 'Comercial')
                  <th scope="col">Cotización</th>
                  <th></th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach ($negocios as $negocio)
              <tr>
                <td>{{$negocio->nombre_negocio}}</td>
                <td>{{$negocio->fecha_creacion}}</td>
                <td>{{$negocio->estado->nombre_estado}}</td>
                <td><a style="text-decoration: none" class="btn btn-ligth" href="{{route('negocio.proAsoc',['idNegocio' => $negocio->idNegocio])}}"><svg class="m-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg>Ver</a></td>
                <td><a style="text-decoration: none" class="btn btn-ligth" href="{{route('negocio.serAsoc',['idNegocio' => $negocio->idNegocio])}}"><svg class="m-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg>Ver</a></td>
                <td><a style="text-decoration: none" class="btn btn-ligth" href="{{route('negocio.partAsoc',['idNegocio' => $negocio->idNegocio])}}"><svg class="m-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg>Ver</a></td>
                <td><a style="text-decoration: none" class="btn btn-ligth" href="{{route('negocio.docAsoc',['idNegocio' => $negocio->idNegocio])}}"><svg class="m-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg>Ver</a></td>
                {{-- cotización--}}
                @if ($_SESSION['nombre_rol'] == 'Administrador' || $_SESSION['nombre_rol'] == 'Comercial')
                  <td><a class="btn btn-light" href="{{route('vista.cotizacion',['idNegocio' => $negocio->idNegocio])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
                    <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                  </svg>Crear</a></td>
                  {{-- eliminar negocio --}}
                  <td><a class="btn btn-light" href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                  </svg></a></td>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
          @if ($_SESSION['nombre_rol'] == "Administrador" || $_SESSION['nombre_rol'] == "Comercial")
            <div class="row">
              <div class="col d-flex justify-content-center">
                <a href="/negocio-fase1" class="btn btn-dark">Crear Negocio</a>
              </div>
            </div>
          @endif

    </div>
    @include('sweetalert::alert')
    <script src="{{asset('js/eliminar_producto.js')}}"></script> 
@endsection