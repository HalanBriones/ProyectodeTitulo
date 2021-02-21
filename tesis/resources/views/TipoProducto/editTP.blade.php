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
                    <div class="card-header">{{ __('Editar Tipo Producto') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('tipoProducto.update',$tipoproducto)}}">
                            @csrf
                            <div class="form-group row">
                              <label class="col-md-4 col-form-label text-md-right" for="">Nombre Tipo Producto</label>
                              <div class="col-md-6">
                                <input name="nombre_tp" id="nombre_tp" type="text" class="form-control @error('nombre_tp') is-invalid @enderror" name="nombre_tp" autocomplete="nombre_tp" value="{{$tipoproducto->nombre_tipo_producto}}">
                                @error('nombre_tp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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