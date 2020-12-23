@extends('layouts.plantilla')

@section('content')
@php
    session_start(['name' => 'Login']);
@endphp
    <div class="container">
        <table class="table mt-4" method="GET" action="/usuarios">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Rut</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <th>Perfil</th>
                <th></th>

              </tr>
            </thead>
            <tbody>
              @foreach ($usuarios as $usuario)
              <tr>
                <td>{{ $usuario->rut }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ $usuario->telefono }}</td>
                <td>{{$usuario->perfil->nombre_perfil}}</td>
                @if ($_SESSION['perfil'] == 'Administrador')
                <td><a  class="btn btn-dark me-md-2" href="{{route('usuarios.editRol',$usuario)}}">Editar Rol</a></td>
                @endif

              </tr>
              @endforeach

            </tbody>
          </table>
    </div>
@endsection