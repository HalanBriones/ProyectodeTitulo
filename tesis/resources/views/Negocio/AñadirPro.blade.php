@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div><p>Creacion Negocio</p></div>
            <div><p>Fase 2</p></div>
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
                {{--Productos--}}
                <div class="d-flex justify-content-center mb-3 mt-3">
                    <h3>Añadir Productos a Oportunidad de Negocio</h3>
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="">Producto</label>
                            <select class="form-control" name="producto" id="producto">
                                <option value="" selected>Seleccione Producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{$producto->idproducto}},{{$producto->nombre_producto}}">{{$producto->nombre_producto}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="">Tipo Comercialización</label>
                            <select class="form-control" onclick="control()"  name="comercializacionproducto" id="comercializacionproducto">
                                <option name="option"  id="option" hidden selected>Seleccione Comercializacion</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="cantidad_productos">Cantidad productos</label>
                            <input class="form-control" value="1" type="number" onkeyup="preciosProducto()" name="cantidad_productos" id="cantidad_productos" >
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
                                    <input type="number" class="form-control" onkeyup="preciosProducto()" name="precioPcosto" id="precioPcosto" placeholder="0.00">
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
                                    <input type="number" class="form-control" onkeyup="preciosProducto()" name="margen_negocioPro" id="margen_negocioPro" placeholder="0">
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
                                    <input type="number" class="form-control" onkeyup="preciosProducto()" name="margen_vendedorPro" id="margen_vendedorPro" placeholder="0">
                                  </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="mb-1" for="meses">Cantidad meses</label>
                                <input  class="form-control" onkeyup="preciosProducto()" type="number"  name="meses" id="meses">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="preciomes">Precio mes</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="preciomes" id="preciomes" placeholder="0.00">
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
                                    <input disabled type="number" class="form-control" name="precioPventa" id="precioPventa"e placeholder="0.00">
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
                                    <input disabled type="number" class="form-control" name="utilidadPro" id="utilidadPro" placeholder="0.00">
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
                                    <input disabled type="number" class="form-control" name="ganancia" id="ganancia" placeholder="0.00">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="precioPventa">Precio  Venta Total Producto USD</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled class="form-control" type="number" name="precioPventa_total" id="precioPventa_total">
                                  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="utilidadPro">Utilidad Total USD</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled class="form-control" type="number" name="utilidadPro_total" id="utilidadPro_total">
                                  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="ganancia">Ganancia Total Vendedor USD</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled class="form-control" type="number" name="gananciaTotal_vendedor" id="gananciaTotal_vendedor">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-4">
                            <div class="form-group">
                                <label class="mb-1" for="">Configuración</label>
                                <textarea class="form-control" name="configuracion" id="configuracion" cols="6" rows="8"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-end mb-4">
                        <button onclick="insertPro(event)" class="btn btn-dark">+</button>
                    </div>
                </div>
                <form >
                    @csrf
                    <table class="table mt-5 mb-5">
                        <thead>
                            <th>Producto</th>
                            <th>Comercializacion</th>
                            <th>Costo USD</th>
                            <th>Precio Venta USD</th>
                        </thead>
                        <tbody  id="+pro">

                        </tbody>
                    </table>
                </form>
                <div class="row mt-5 ">
                    <div class="d-flex justify-content-center">
                        <button  id="btnAñadir" class="btn btn-dark" type="submit">Agregar</button>
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