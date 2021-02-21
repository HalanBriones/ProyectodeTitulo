  @extends('layouts.plantilla')
@php
      if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
    <div class="container">
        <table class="table table-striped mt-4">
          <input type="hidden" value="{{$idNegocio}}">
            <thead class="thead-dark">
              @if (count($user_participa)>0)
                <tr>
                  <th scope="col">Nombre</th>
                  <th>Apellido</th>
                  <th>Rol</th>
                  <th></th>
                </tr>                  
              @else
                <tr>
                  <th scope="col">Participantes</th>
                </tr>
              @endif

            </thead>
            <tbody>
              @if (count($user_participa)>0)
              @foreach ($user_participa as  $user_par)
                <tr>
                  <td>{{$user_par->nombre}}</td>
                  <td>{{$user_par->apellido}}</td>
                  <td>{{$user_par->nombre_rol}}</td>
                  <td>
                    <a class="btn btn-light" onclick="deleteParticipante({{$user_par->usuario_rut}},{{$idNegocio}})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg></a>
                  </td>
                </tr>
                @endforeach
              @else
                  <tr>
                    <td><div class="d-flex justify-content-center"><h4>No existen Participantes</h4></div></td>
                  </tr>
              @endif

            </tbody>
          </table>
          @if ($_SESSION['nombre_rol'] == 'Administrador'|| $_SESSION['nombre_rol'] == 'Comercial' )
          <div class="d-flex justify-content-center">
            <div class="">
                <a href="{{route('añadir.par',['idNegocio' => $idNegocio])}}" class="btn btn-dark btn-sm active center" role="button" aria-pressed="true">Añadir</a>
            </div>
          </div>
          @endif
    </div>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{asset('js/eliminar_producto.js')}}"></script>
    
@endsection