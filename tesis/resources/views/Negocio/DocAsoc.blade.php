@extends('layouts.plantilla')
@php
      if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
    <div class="container">
        <table class="table mt-4">
            <thead class="thead-light">
              @if (count($documentos)>0)
                <tr>  
                  <th scope="col">Nombre documento</th>
                  <th>Fecha subida</th>
                </tr>    
              @else
              <tr>  
                <th>Documento</th>
              </tr>
              @endif

            </thead>
            <tbody>
              @if (count($documentos)>0)
                @foreach ($documentos as  $documento)
                  <tr>
                    <td>{{$documento->nombre_doc}}</td>
                    <td>{{$documento->fecha_subida}}</td>
                    <td><a href="{{url('/down',['documento'=>$documento])}}">Descargar</a></td>
                  </tr>
                @endforeach
              @else
                <tr>
                  <th><div class="d-flex justify-content-center"><h5>No existen documentos</h5></div></th>
                </tr>
              @endif
            </tbody>
          </table>
    </div>
    @if ($_SESSION['nombre_rol'] == 'Administrador'|| $_SESSION['nombre_rol'] == 'Comercial' )
    <div class="d-flex justify-content-center">
      <div class="">
          <a href="{{route('añadir.doc',['idNegocio' => $idNegocio])}}" class="btn btn-dark btn-sm active center" role="button" aria-pressed="true">Añadir</a>
      </div>
    </div>
    @endif
    @include('sweetalert::alert')
    <script src="{{asset('js/eliminar_producto.js')}}"></script>
    
@endsection