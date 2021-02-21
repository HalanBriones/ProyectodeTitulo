@extends('layouts.plantilla')
@php
      if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div><p>Creacion Negocio</p></div>
            <div><p>Fase 3</p></div>
        </div>
        <div class="card-body">
            <form action="{{route('añadir.storeDoc')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="d-flex justify-content-center mb-5">
                    <h4>Subida de archivos</h4>
                </div>
                <input hidden name="idnegocio" id="idnegocio"  type="text" value="{{$idNegocio}}">
                <div class="row d-flex justify-content-center">
                    <div class="col-5 d-flex inline">
                        <div class="form-group mb-2">
                            <input   type="file" class="form-control" name="documento[]" multiple id="documento">
                        </div>
                    </div>
                </div>
                <div class="row mt-5 ">
                    <div class="d-flex justify-content-center">
                        <button  id="btnAñadir" class="btn btn-dark" type="submit">Añadir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{'js/negocio.js'}}"></script>
@endsection