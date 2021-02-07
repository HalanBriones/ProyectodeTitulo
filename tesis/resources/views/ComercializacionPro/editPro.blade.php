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
                    <div class="card-header">{{ __('Registro Comercialización Producto') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{route('comerPro.update', $comer)}}">
                            @csrf    
                            <div class="form-group row mb-2">
                                <label for="password_confirm" class="col-md-6 col-form-label text-md-right">{{ __('Nombre Comercialización Producto') }}</label>
                                <div class="col-md-6">
                                    <input id="comercializacionPro" value="{{$comer->nombre_comercializacion}}" type="text" class="form-control has-feedback-left @error('pass_conf') is-invalid @enderror" name="comercializacionPro" required >
                                    @error('comercializacionPro')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="boton" class="btn btn-dark" >
                                        {{ __('Editar') }}
                                    </button>
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

@endsection