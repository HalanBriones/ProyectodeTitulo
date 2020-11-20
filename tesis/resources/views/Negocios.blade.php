@extends('layout')

@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Nombre Negocio</th>
        <th scope="col">Fecha</th>
        <th scope="col">Estado</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
  <div class="row ">
    <div class="col align-items-center text-right">
        <input type="button" value="Crear Negocio" class=" rigth btn btn-dark ">
    </div>
  </div>
@endsection