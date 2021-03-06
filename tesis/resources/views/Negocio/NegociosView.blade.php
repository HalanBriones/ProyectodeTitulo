@extends('layouts.plantilla')
@php
      if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
      <div class="row">
        <div class="col d-flex justify-content-center">
          <h3>Oportunidades de Negocio</h3>
        </div>
      </div>
      <form action="/busqueda/negocio" method="POST">
        @csrf
        <div class="row">
          <div class="col-2 ">
            <a href="/estados" class="btn btn-sm btn-dark" >Estado</a>
          </div>
          <div class="d-flex justify-content-end">
            <div class="col-2">
              <input id="cliente" name="cliente" class="form-control" type="search" placeholder="Cliente">
            </div>
            <div class="col-3">
              <select name="estado" id="estado" class="form-control">
                <option value="">Seleccione Estado</option>
                @foreach ($estados as $estado)
                    <option value="{{$estado->idEstado}}">{{$estado->nombre_estado}}</option>
                @endforeach
              </select>
            </div>
            <div>
              <button class="btn btn-sm btn-dark" type="submit">Buscar</button>
            </div>
          </div>
        </div>
      </form>
        <table class="table mt-4" method="GET" action="/verNegocios">
            <thead class="thead-light">
              <tr class="">
                <th scope="col">Sigla</th>
                <th scope="col">Nombre Negocio</th>
                <th scope="col">Estado</th>
                <th scope="col">Productos </th>
                <th scope="col">Servicios </th>
                <th scope="col">Participantes</th>
                <th scope="col">Documentos</th>
                <th scope="col">Cliente</th>
                @if ($_SESSION['nombre_rol'] == 'Administrador' || $_SESSION['nombre_rol'] == 'Comercial')
                  <th scope="col">Cotización</th>
                  <th scope="col">Enviar cotización</th>
                  <th scope="col">Cambiar estado</th>
                @endif
              </tr>
            </thead>
            <tbody class="">
              @foreach ($negocios as $negocio)
              <tr>
                @if ($negocio->sigla_negocio != "")
                  <td>{{$negocio->sigla_negocio}}</td>
                @else
                  <td>En transcurso</td> 
                @endif
                <td>{{$negocio->nombre_negocio}}</td>
                <td>{{$negocio->estado->nombre_estado}}</td>
                <td><a  class="btn btn-ligth" href="{{route('negocio.proAsoc',['idNegocio' => $negocio->idNegocio])}}"><svg class="m-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg></a></td>
                <td><a class="btn btn-ligth" href="{{route('negocio.serAsoc',['idNegocio' => $negocio->idNegocio])}}"><svg class="m-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg></a></td>
                <td><a class="btn btn-ligth" href="{{route('negocio.partAsoc',['idNegocio' => $negocio->idNegocio])}}"><svg class="m-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg></a></td>
                <td><a class="btn btn-ligth" href="{{route('negocio.docAsoc',['idNegocio' => $negocio->idNegocio])}}"><svg class="m-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg></a></td>
                <td><a class="btn btn-ligth" href="{{route('negocio.cliente',['idNegocio' => $negocio->idNegocio])}}"><svg class="m-0" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                </svg></a></td>
                {{-- cotización--}}
                @if ($_SESSION['nombre_rol'] == 'Administrador' || $_SESSION['nombre_rol'] == 'Comercial')
                  <td><a class="btn btn-light" href="{{route('vista.cotizacion',['idNegocio' => $negocio->idNegocio])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-check" viewBox="0 0 16 16">
                    <path d="M10.854 7.854a.5.5 0 0 0-.708-.708L7.5 9.793 6.354 8.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                  </svg>Ver</a></td>
                  <td><a class="btn btn-light" href="{{route('enviar',$negocio->idNegocio)}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                      <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
                    </svg></a></td>
                @endif
                <td>
                  <button type="button" onclick="estado({{$negocio}})" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#exampleModal">
                  Estado
                  </button>
                </td>
              </tr>
              @endforeach
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cambiar estado del Negocio</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body"> 
                        <select name="cambiar_estado" id="cambiar_estado" onchange="cambio()" class="form-control">
                          <option selected value="">Seleccione estado</option>
                          @foreach ($estados as $estado)
                            @if ($estado->nombre_estado == "Cotización enviada" || $estado->nombre_estado == "Gestionando negocio")
                            <option hidden value="{{$estado->idEstado}}">{{$estado->nombre_estado}}</option>  
                            @else
                            <option value="{{$estado->idEstado}}">{{$estado->nombre_estado}}</option>  
                            @endif
                          @endforeach
                        </select>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" id="guardar"  class="btn btn-primary">Guardar</button>
                      </div>
                    </div>
                  </div>
                  </div>
            </tbody>
          </table>
          @if ($_SESSION['nombre_rol'] == "Administrador" || $_SESSION['nombre_rol'] == "Comercial")
            <div class="row">
              <div class="col d-flex justify-content-center">
                <a href="/negocio-fase1" class="btn btn-dark">Crear Negocio</a>
              </div>
            </div>
          @endif

{{-- eliminar negocio --}}
{{-- <td><a class="btn btn-light" href="{{route('enviar',['idNegocio' => $negocio->idNegocio])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a></td> --}}
    @include('sweetalert::alert')
    <script src="{{asset('js/eliminar_producto.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{asset('js/cambiar-estado.js')}}"></script>
@endsection