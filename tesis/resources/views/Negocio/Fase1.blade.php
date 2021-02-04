@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div><p>Creacion Negocio</p></div>
            <div><p>Fase 1</p></div>
        </div>
        <div class="card-body">
            <form action="{{route('negociof1.store')}}" method="POST">
                @csrf
                {{-- datos negocio --}}
                <div class="row">
                    <div class="col ">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="nombre_negocio">Nombre Negocio</label>
                            <input   type="text" class="form-control" placeholder="Nombre Negocio" name="nombre_negocio" id="nombre_negocio" required>
                        </div>
                    </div>
                    {{-- derecha --}}
                    <div class="col">
                    <div class="form-group mb-2">
                        <label class="mb-1" for="">Descripción</label>
                        <textarea  class="form-control" name="descripcion" id="descripcion" cols="6" rows="5"></textarea>
                    </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-dark" type="submit">Siguiente</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{'js/negocio.js'}}"></script>
    <script src="{{'js/comercializacion.js'}}"></script>
@endsection