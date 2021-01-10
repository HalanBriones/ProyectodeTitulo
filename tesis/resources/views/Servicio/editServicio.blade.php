@extends('layouts.plantilla')
@php
    session_start(['name' =>'Login']);
@endphp
@section('content')
<main>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Servicio') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route("servicio.updateServicio",$servicio)}}">
                            @csrf
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label text-md-right" for="">Nombre Servicio</label>
                              <div class="col-md-6">
                                <input name="nombre_servicio" id="nombre_servicio" type="text" class="form-control @error('nombre_servicio') is-invalid @enderror" name="nombre_servicio" required autocomplete="nombre_servicio" value="{{$servicio->nombre_servicio}}">
                                @error('nombre_servicio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group row mt-3">
                                <label class="col-md-4 col-form-label text-md-right" for="">ID Chile Compra</label>
                                <div class="col-md-6">
                                  <input name="idChileCompra" id="idChileCompra" type="text" class="form-control @error('idChileCompra') is-invalid @enderror" name="idChileCompra" required autocomplete="idChileCompra" autofocus value="{{$servicio->idChileCompra}}">
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
                                <textarea required class="form-control" name="descripcion" id="descripcion" cols="20" rows="10">{{$servicio->descripcion}}</textarea>
                              </div>
                            </div>
                            
                            <div class="form-group row mt-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-dark" >
                                        {{ __('Editar') }}
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