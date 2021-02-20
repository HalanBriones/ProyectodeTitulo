@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div><h5>Vista Producto</h5></div>
        </div>
        <div class="card-body">
            <form   id="formulario" method="POST" action="{{route('ProAsociado.edit',$pro_has_op)}}">
                @csrf
                {{--Productos--}}
                <div class="row ">
                    @foreach ($participantes as $par)
                    <div class="col d-flex justify-content-end ">
                        @if ( $_SESSION['rut'] == $par->usuario_rut &&  ($_SESSION['nombre_rol'] == 'Comercial' || $_SESSION['nombre_rol'] == 'Administrador'))
                        <a aria-disabled="true" class="m-2 btn btn-secondary" href="{{route('pro.edit',$pro_has_op->id_pro_has_op)}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg></a>
                        @endif
                        @if ($_SESSION['rut'] == $par->usuario_rut  && ($_SESSION['nombre_rol'] == 'Tecnico' || $_SESSION['nombre_rol'] == 'Administrador'))
                            <a href="{{route('configuracion',$pro_has_op->id_pro_has_op)}}" class="m-2 btn btn-sm btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                            </svg>Configuración</a>
                            @break
                        @endif
                    </div>  
                    @endforeach

                </div>
                <input name="rol" type="hidden" value="{{$_SESSION['nombre_rol']}}">
                <div class="row">
                    <div class="col-5">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="">Producto</label>
                            <select disabled class="form-control"  name="producto" id="producto">
                                <option name="option"  id="option" value="{{$producto->idproducto}}" hidden selected>{{$producto->nombre_producto}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="">Tipo Comercialización</label>
                            <select disabled class="form-control">
                                <option name="comercializacion" id="comercializacion" value="{{$comercializacion->idcomercializacion_producto}},{{$comercializacion->nombre_comercializacion}}" selected >{{$comercializacion->nombre_comercializacion}}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="cantidad_productos">Cantidad productos</label>
                            <input disabled class="form-control" value="1" type="number" onchange="productos()" name="cantidad_productos" id="cantidad_productos" value="{{$pro_has_op->cantidad_productos}}">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-2">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="precioPcosto">Costo unitario USD</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" onchange="productos()" name="precioPcosto" id="precioPcosto" placeholder="0.00" value="{{$pro_has_op->costo_producto}}">
                                  </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="margen_negocioPro">Margen Producto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">%</div>
                                    </div>
                                    <input disabled type="number" class="form-control" onchange="productos()" name="margen_negocioPro" id="margen_negocioPro" placeholder="0" value="{{$pro_has_op->margen_negocioPro}}">
                                  </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="margen_vendedorPro">Margen Vendedor</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">%</div>
                                    </div>
                                    <input disabled type="number" class="form-control" onchange="productos()" name="margen_vendedorPro" id="margen_vendedorPro" placeholder="0" value="{{$pro_has_op->margen_vendedorPro}}">
                                  </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="mb-1" for="meses">Cantidad meses</label>
                                <input disabled class="form-control" onchange="productos()" type="number"  name="meses" id="meses" value="{{$pro_has_op->numero_meses}}">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="preciomes">Precio mes</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled  type="number" onchange="productos()" class="form-control" name="preciomes" id="preciomes" placeholder="0.00" value="">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="precioPventa">Precio Unitario Venta Producto USD</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled step="any"  type="number" class="form-control" name="precioPventa" id="precioPventa" placeholder="0.00" value="{{$pro_has_op->precio_ventaPro}}">
                                  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="utilidadPro">Utilidad neta USD</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" step="any" class="form-control" name="utilidadPro" id="utilidadPro" placeholder="0.00" value="{{$pro_has_op->utilidadPro}}">
                                  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="ganancia">Ganancia Vendedor USD</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" step="any" class="form-control" name="ganancia" id="ganancia" placeholder="0.00" value="{{$pro_has_op->ganancia_vendedorPro}}">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="mb-1" for="">Configuración</label>
                                <textarea disabled class="form-control" name="configuracion" id="configuracion" cols="6" rows="8">{{$pro_has_op->configuracion}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('js/preciosEdit.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
@endsection