@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div><p>Creacion Negocio</p></div>
            <div><p>Fase 3</p></div>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                @csrf
                {{ csrf_field() }}
                <div class="d-flex justify-content-center mb-5">
                    <h3>Subida de archivos</h3>
                </div>
                
                {{-- datos principales --}}
                <div class="row">
                    {{-- izquierda --}}
                    <div class="col ">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="nombre_negocio">Archivos</label>
                            <input   type="file" class="form-control" placeholder="Nombre Negocio" name="nombre_negocio" id="nombre_negocio" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-dark" type="submit">Finalizar</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{'js/negocio.js'}}"></script>
@endsection