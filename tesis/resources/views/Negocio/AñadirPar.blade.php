@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="card">
        <div class="card-header">
            <div><p>Añadir Participantes</p></div>
        </div>
        <div class="card-body">
            <form   id="formulario" method="POST" action="{{route('negocio.store')}}">
                @csrf
                <div>
                    <input hidden name="idnegocio" id="idnegocio"  type="text" value="{{$_SESSION['idNegocio']}}">
                    <input hidden name="nombre_negocio" id="nombre_negocio" type="text" value="{{$_SESSION['nombre_negocio']}}">
                    <input hidden name="descripcion_negocio" id="descripcion_negocio" type="text" value="{{$_SESSION['descripcion_op']}}">
                    <input hidden name="estado_negocio" id="estado_negocio" type="text" value="{{$_SESSION['estado_op']}}">
                    <input hidden name="rut_creador" id="rut_creador" type="text" value="{{$_SESSION['rut_op']}}">
                </div>
                {{-- Participantes --}}
                <div class="row mt-5 mb-5">
                    <div class="col mt-4">
                        <div class="d-flex justify-content-center">
                            <h4>Participantes del Negocio</h4>
                        </div>    
                        <div  class="form-check">
                            @foreach ($usuarios as $usuario)
                                @if ($usuario->rut != $_SESSION['rut'])
                                <input  type="checkbox" value="{{$usuario->rut}}" class="ml-2 form-check-input" name="participante[]">{{$usuario->nombre}} {{$usuario->apellido}}<br>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>    

                <div class="row mt-5 ">
                    <div class="d-flex justify-content-center">
                        <button  id="btnEnviar" class="btn btn-dark" type="submit">Siguiente</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{'js/negocio.js'}}"></script>
    <script src="{{'js/precios.js'}}"></script>
    <script src="{{'js/comercializacion.js'}}"></script>
@endsection