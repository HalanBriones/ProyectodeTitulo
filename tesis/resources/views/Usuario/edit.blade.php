@extends('layouts.plantilla')
@php
    session_start(['name' =>'Login']);
@endphp
@section('content')
<main>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">{{ __('Editar Perfil') }}</div>
    
                    <div class="card-body">
          <form method="post" action="{{route('usuarios.updatePerfil',$user)}}" >
                @csrf
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-lg-8">
                      <input name="nombre" type="text" class="form-control" id="nombre" value="{{$user->nombre}}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-lg-8">
                      <input name="email" type="text" class="form-control" id="email" value="{{$user->email}}" >
                    </div>
                  </div>

                <div class="form-group">
                  <label for="perfil" class="col-sm-2 col-form-label">Perfil</label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" id="perfil" value="{{$user->perfil->nombre_perfil}}" disabled>
                  </div>
                </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                    <div class="col-lg-8">
                      <input name="apellido" type="text" class="form-control" id="apellido" value="{{$user->apellido}}" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                    <div class="col-lg-8">
                      <input name="telefono" type="text" class="form-control" id="telefono" value="{{$user->telefono}}" >
                    </div>
                  </div>
                </div>
              </div>
              <div class="row justify-content-left mt-4">

              </div>
                <div class="form-group row mt-4">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-dark">Editar</button>
                  </div>
                </div>
              </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    </main>
    <script src="{{ asset('js/validacion_email.js') }}"></script>
    <script src="{{ asset('js/validar_password.js') }}"></script>


@endsection