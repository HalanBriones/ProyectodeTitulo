@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="container">
        <table class="table table-striped mt-4">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nombre</th>
                <th>Apellido</th>
                <th>Rol</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($user_participa as  $user_par)
              <tr>
                <td>{{$user_par->nombre}}</td>
                <td>{{$user_par->apellido}}</td>
                <td>{{$user_par->nombre_rol}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    @include('sweetalert::alert')
    <script src="{{asset('js/eliminar_producto.js')}}"></script>
    
@endsection