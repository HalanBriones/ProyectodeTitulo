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
                    <h3>Agregar Productos a Oportunidad de Negocio</h3>
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
                                <label class="sr-only mb-1" for="precioPventa">Precio Venta Producto USD</label>
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
                                <label class="sr-only mb-1" for="precioPventa">Precio Venta Total Producto USD</label>
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
                 {{--Servicios--}}
                 <div class="d-flex justify-content-center mb-3 mt-3">
                    <h3>Agregar Servicios a Oportunidad de Negocio</h3>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-2">
                                <label class="mb-1" for="servicio">Servicio</label>
                                <select class="form-control" name="servicio" id="servicio">
                                    <option value="" selected>Seleccione Servicio</option>
                                    @foreach ($servicios as $servicio)
                                        <option value="{{$servicio->idservicio}},{{$servicio->nombre_servicio}}">{{$servicio->nombre_servicio}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label class="mb-1" for="">Conocimiento</label>
                                <select class="form-control" name="conocimiento" id="conocimiento">
                                    <option value="" selected>Seleccione Conocimiento</option>
                                    @foreach ($conocimientos as $conocimiento)
                                    <option value="{{ $conocimiento->idconocimiento_servicio}},{{$conocimiento->nombre_conocimiento}}">{{$conocimiento->nombre_conocimiento}}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label class="mb-1" for="">Comercialización</label>
                                <select class="form-control" name="comercializacionservicio" id="comercializacionservicio">
                                    <option value="" selected>Seleccione Comercializacion</option>
                                    @foreach ($comercializacionSer as $comercializacionS)
                                    <option value="{{$comercializacionS->idcomercializacion_servicio}},{{$comercializacionS->nombre_comercializacion}}">{{$comercializacionS->nombre_comercializacion}}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="primer-div">
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="costoxhora">Costo por Hora UF</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" class="form-control" onkeyup="preciosServicio()" name="costoxhora" id="costoxhora">
                                  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="cantidad_hora">Cantidad horas</label>
                                <input class="form-control"  onkeyup="preciosServicio()" type="number" name="cantidad_hora" id="cantidad_hora">
    
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="n_meses">Numero meses</label>
                                <input type="number" class="form-control" onkeyup="preciosServicio()"  name="n_meses" id="n_meses">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="margen_negocioSer">Margen Servicio</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">%</div>
                                    </div>
                                    <input  type="number" onkeyup="preciosServicio()" class="form-control" name="margen_negocioSer" id="margen_negocioSer">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2" id="segundo-div">
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="valor_cliente_hora">Valor Cliente hora UF</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="valor_cliente_hora" id="valor_cliente_hora">
                                  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="precioSventa">Valor Total Cliente UF</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="precioSventa" id="precioSventa">
                                  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="valor_venta_mes">Valor venta mes UF</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="valor_venta_mes" id="valor_venta_mes">
                                  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="margen_vendedorSer">Margen Vendedor</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">%</div>
                                    </div>
                                    <input type="number" onkeyup="preciosServicio()" class="form-control" name="margen_vendedorSer" id="margen_vendedorSer">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2" id="tercer-div">
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="costo_total_mes">Costo total mes uf</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">%</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="costo_total_mes" id="costo_total_mes">
                                  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="costo_total">Costo total UF</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="costo_total" id="costo_total">
                                  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="utilidadSer">Utilidad Unitaria UF</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="utilidadSer" id="utilidadSer">
                                  </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="gananciaSer">Ganancia Vendedor UF</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" onkeyup="preciosServicio()" name="gananciaSer" id="gananciaSer">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="ganancia_vendedorSer_clp">Ganancia vendedor CLP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="ganancia_vendedorSer_clp" id="ganancia_vendedorSer_clp">
                                  </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="costo_totalSer_clp">Costo total CLP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="costo_totalSer_clp" id="costo_totalSer_clp">
                                  </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="costo_total_mes_clp">Costo total mes CLP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="costo_total_mes_clp" id="costo_total_mes_clp">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-5">
                            <div class="form-group">
                                <label class="mb-1" for="">Comentarios</label>
                                <textarea class="form-control" name="comentario" id="comentario" cols="8" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="mb-1" for="valor_uf">Valor 1 UF actual</label>
                                <input class="form-control" onkeyup="preciosServicio()" name="valor_uf" id="valor_uf">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-end mb-4">
                            <button onclick="insertSer(event)" class="btn btn-dark">+</button>
                        </div>
                    </div>
                </div>
                <form >
                    @csrf
                    <table class="table mt-3 mb-3">
                        <thead>
                            <th>Servicio</th>
                            <th>Comercializacion</th>
                            <th>Conocimiento</th>
                            <th>Precio Venta</th>
                        </thead>
                        <tbody  id="+ser">
                        </tbody>
                    </table>
                </form>

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