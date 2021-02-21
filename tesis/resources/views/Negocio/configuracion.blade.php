@extends('layouts.plantilla')
@php
      if (!isset($_SESSION)) {
    session_start(['name' => 'Login']);
  }
@endphp
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div><p>Editar Producto</p></div>
        </div>
        <div class="card-body">
            <form   id="formulario" method="POST" action="{{route('configuracion.save',$pro_has_op)}}">
                @csrf
                {{--Productos--}}
                <div class="d-flex justify-content-center mb-3 mt-3">
                    <h3>Editar Producto</h3>
                </div>
                <input name="rol" type="hidden" value="{{$_SESSION['nombre_rol']}}">
                @if ($_SESSION['nombre_rol'] == 'Administrador' || $_SESSION['nombre_rol'] == 'Comercial')
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
                                    <input disabled type="number" onchange="productos()" class="form-control" name="preciomes" id="preciomes" placeholder="0.00" value="">
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
                                <textarea class="form-control" name="configuracion" id="configuracion" cols="6" rows="8">{{$pro_has_op->configuracion}}</textarea>
                            </div>
                        </div>
                    </div>

                </div>
                @endif
                <div class="row mt-4">
                    <div class="col d-flex justify-content-center">
                        <button class="btn btn-dark" type="submit">Editar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{asset('js/preciosEdit.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
@endsection