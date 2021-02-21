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
                    <div class="card-header">{{ __('Registro Estados de un Negocio') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('estado.store')}}">
                            @csrf    
                            <div class="form-group row mb-2">
                                <label for="password_confirm" class="col-md-6 col-form-label text-md-right">{{ __('Nombre Estado') }}</label>
                                <div class="col-md-6">
                                    <input id="estado" type="text" class="form-control" name="estado" required >
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" id="boton" class="btn btn-dark" >
                                        {{ __('Crear') }}
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{asset('js/eliminar_producto.js')}}"></script>
    </main>

@endsection