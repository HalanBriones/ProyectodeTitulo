@extends('layouts.plantilla')
@php
      if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
<main>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Creación Servicio') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('servicio.registrar')}}">
                            @csrf
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label text-md-right" for="">Nombre Perfil</label>
                              <div class="col-md-6">
                                <input name="nombre_servicio" id="nombre_servicio" type="text" class="form-control @error('nombre_servicio') is-invalid @enderror" name="nombre_servicio" value="{{ old('nombre_servicio') }}" required autocomplete="nombre_servicio" autofocus>
                                @error('nombre_servicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label class="col-md-4 col-form-label text-md-right" for="">Conocimiento</label>
                                <div class="col-md-6">
                                  <input name="conocimiento" id="conocimiento" type="text" class="form-control @error('nombre_servicio') is-invalid @enderror" name="conocimiento" value="{{ old('conocimiento') }}" required autocomplete="conocimiento" autofocus>
                                  @error('conocimiento')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                  </div>
                              </div>
                            <div class="form-group row mt-3">
                                <label class="col-md-4 col-form-label text-md-right" for="">ID Chile Compra</label>
                                <div class="col-md-6">
                                  <input name="idChileCompra" id="idChileCompra" type="text" class="form-control @error('idChileCompra') is-invalid @enderror" name="idChileCompra" value="{{ old('idChileCompra') }}" required autocomplete="idChileCompra" autofocus>
                                  @error('idChileCompra')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                  @enderror
                                  </div>
                              </div>
                            <div class="form-group row mt-3">
                              <label class="col-md-4 col-form-label text-md-right" for="">Descripción</label>
                              <div class="col-md-6">
                                <textarea  class="form-control" name="descripcion" id="descripcion" cols="20" rows="10"></textarea>
                              </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark" >
                                        {{ __('Crear') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
    </div>

    </main>


@endsection