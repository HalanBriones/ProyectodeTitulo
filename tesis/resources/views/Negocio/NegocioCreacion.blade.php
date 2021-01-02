@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div><p>Creacion Negocio</p></div>

            <div><p>1/3</p></div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{route('negocio.store')}}">
                @csrf
                {{-- datos principales --}}
                <div class="row">
                    {{-- izquierda --}}
                    <div class="col ">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="">Nombre Negocio</label>
                            <input required name="nombre-negocio" id="nombre-negocio" type="text" class="form-control" placeholder="Nombre Negocio">
                        </div>
                        <div class="form-group mb-2">
                            <label class="mb-1" for="moneda">Moneda  a trabajar</label>
                            <select class="form-control" name="moneda" id="moneda" required>
                                <option value="" selected>Seleccione moneda</option>
                                @foreach ($monedas as $moneda)
                                    <option value="{{$moneda->idMoneda}}">{{$moneda->nombre}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                  {{-- derecha --}}
                  <div class="col">
                    <div class="form-group mb-2">
                        <label class="mb-1" for="">Tipo Negocio</label>
                        <div class="form-group">
                            <select class="form-control" name="tipo_negocio" id="tipo_negocio" required>
                                <option value="" selected>Seleccione tipo negocio</option>
                                @foreach ($tipoNegocios as $tipoNegocio)
                                 <option value="{{$tipoNegocio->idTipoNegocio}}">{{$tipoNegocio->nombre_tipo_negocio}}</option>   
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label class="mb-1" for="">Descripción</label>
                        <textarea required class="form-control" name="descripcion" id="descripcion" cols="10" rows="1"></textarea>
                    </div>
                  </div>
                </div>
                {{--Productos--}}
                <div class="d-flex justify-content-center mb-3 mt-3">
                    <h3>Productos</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="">Producto</label>
                            <select class="form-control" name="producto" id="producto">
                                <option value="" selected>Seleccione Producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{$producto->idPro}}">{{$producto->nombre_producto}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="">Comercialización</label>
                            <select class="form-control" name="comercializacion" id="comercializacion">
                                <option value="" selected>Seleccione Comercializacion</option>
                                @foreach ($comercializaciones as $comercializacion)
                                <option value="{{$comercializacion->idComercializacion}}">{{$comercializacion->nombre_comercializacion}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="mb-1" for="precioPcosto">Costo</label>
                            <input class="form-control " type="number" name="precioPcosto" id="precioPcosto">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="mb-1" for="precioPcosto">Precio Venta</label>
                            <input class="form-control " type="number" name="precioPventa" id="precioPventa">
                        </div>
                    </div>
                    {{--Agregar mas productos pendiente--}}
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-dark">+</button>
                        </div>
                    </div>
                </div>
                {{--Servicios--}}
                 <div class="d-flex justify-content-center mb-3 mt-3">
                    <h3>Servicios</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="">Servicio</label>
                            <select class="form-control" name="producto" id="producto">
                                <option value="" selected>Seleccione Servicio</option>
                                @foreach ($servicios as $servicio)
                                    <option value="{{$servicio->idServicio}}">{{$servicio->nombre_servicio}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="">Comercialización</label>
                            <select class="form-control" name="comercializacion" id="comercializacion">
                                <option value="" selected>Seleccione Comercializacion</option>
                                @foreach ($comercializacionSer as $comercializacionS)
                                <option value="{{$comercializacionS->idComer_servicio}}">{{$comercializacionS->nombre_comercializacion_ser}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="mb-1" for="precioScosto">Costo</label>
                            <input class="form-control " type="number" name="precioScosto" id="precioScosto">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="mb-1" for="precioScosto">Precio Venta</label>
                            <input class="form-control " type="number" name="precioSventa" id="precioSventa">
                        </div>
                    </div>
                    {{--Agregar mas servicios, pendiente--}}
                    <div class="row">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-dark">+</button>
                        </div>
                    </div>
                </div>

                <div class="row mt-3 ">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-dark" type="submit">Siguiente</button>
                    </div>
                </div>
              </form>
        </div>
    </div>
@endsection