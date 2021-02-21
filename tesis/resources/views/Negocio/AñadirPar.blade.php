@extends('layouts.plantilla')
@php
      if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
    <div class="card">
        <div class="card-header">
            <div><p>Añadir Participantes</p></div>
        </div>
        <div class="card-body">
            <form   id="formulario" method="POST" action="{{route('añadirPar.store')}}">
                @csrf
                <div>
                    <input hidden name="idnegocio" id="idnegocio"  type="text" value="{{$idNegocio}}">
                </div>
                {{-- Participantes --}}
                <div class="row  mb-5">
                    <div class="col mt-2">
                        <div class="d-flex justify-content-center">
                            <h4>Participantes del Negocio</h4>
                        </div>    
                        <div  class="form-check mt-3">
                            @foreach ($usuarios as $usuario)
                                @if ($usuario->rut != $rut)
                                <input  type="checkbox" value="{{$usuario->rut}}" class="ml-2 form-check-input" name="participante[]">{{$usuario->nombre}} {{$usuario->apellido}}<br>
                                @else
                                <input disabled checked  type="checkbox" value="{{$usuario->rut}}" class="ml-2 form-check-input" name="participante[]">{{$usuario->nombre}} {{$usuario->apellido}}<br>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>    

                <div class="row mt-5 ">
                    <div class="d-flex justify-content-center">
                        <button  id="btnEnviar" class="btn btn-dark" type="submit">Añadir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{asset('js/negocio.js')}}"></script>
    <script src="{{asset('js/precios.js')}}"></script>
    <script src="{{asset('js/comercializacion.js')}}"></script>
@endsection