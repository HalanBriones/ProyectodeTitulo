@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="container">
        <table class="table table-striped mt-4">
            <thead class="thead-dark">
              @if (count($user_participa)>0)
                <tr>
                  <th scope="col">Nombre</th>
                  <th>Apellido</th>
                  <th>Rol</th>
                </tr>                  
              @else
                <tr>
                  <th scope="col">Participantes</th>
                </tr>
              @endif

            </thead>
            <tbody>
              @if (count($user_participa)>0)
              @foreach ($user_participa as  $user_par)
                <tr>
                  <td>{{$user_par->nombre}}</td>
                  <td>{{$user_par->apellido}}</td>
                  <td>{{$user_par->nombre_rol}}</td>
                </tr>
                @endforeach
              @else
                  <tr>
                    <td><div class="d-flex justify-content-center"><h4>No existen Participantes</h4></div></td>
                  </tr>
              @endif

            </tbody>
          </table>
          @if ($_SESSION['nombre_rol'] == 'Administrador'|| $_SESSION['nombre_rol'] == 'Comercial' )
          <div class="d-flex justify-content-center">
            <div class="">
                <a href="{{route('añadir.par',['idNegocio' => $idNegocio])}}" class="btn btn-dark btn-sm active center" role="button" aria-pressed="true">Añadir</a>
            </div>
          </div>
          @endif
    </div>
    @include('sweetalert::alert')
    <script src="{{asset('js/eliminar_producto.js')}}"></script>
    
@endsection