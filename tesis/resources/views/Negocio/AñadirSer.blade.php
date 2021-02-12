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
                 {{--Servicios--}}
                 <div class="d-flex justify-content-center mb-3 mt-3">
                    <h3>Añadir Servicios a Oportunidad de Negocio</h3>
                </div>
                <div class="row">
                    {{-- Valor uf actual --}}
                    <div class="row d-flex justify-content-end">
                        <div class="col-2 ">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="valor_uf">Valor UF actual</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input type="number" class="form-control" onkeyup="preciosServicio()" name="valor_uf" id="valor_uf">
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
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
                            <div class="form-group">
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
                            <div class="form-group">
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
                    <div class="row mt-3" id="segundo-div">
                        <div class="col">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="valor_cliente_hora">Precio Cliente hora UF</label>
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
                                <label class="sr-only mb-1" for="precioSventa">Precio Total Cliente UF</label>
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
                                <label class="sr-only mb-1" for="valor_venta_mes">Precio venta mes UF</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="valor_venta_mes" id="valor_venta_mes">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3" id="primer-div">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="mb-1" for="cantidad_hora">Cantidad horas totales</label>
                                <input class="form-control"  onkeyup="preciosServicio()" type="number" name="cantidad_hora" id="cantidad_hora">
    
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="n_meses">Numero meses</label>
                                <input type="number" class="form-control" onkeyup="preciosServicio()"  name="n_meses" id="n_meses">
                            </div>
                        </div>
                    </div>
                    <hr class="mt-3 mb-3">
                    <div class="row mt-3" id="tercer-div">
                        <div class="col-2">
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
                        <div class="col-2">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="costo_total_mes">Costo total mes UF</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="costo_total_mes" id="costo_total_mes">
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="costo_total">Costo horas total UF</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="costo_total" id="costo_total">
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
                        <div class="col-2">
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
                    <div class="row mt-3 d-flex justify-content-between">
                        <div class="col-2">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="utilidadSer">Utilidad Total UF</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled type="number" class="form-control" name="utilidadSer" id="utilidadSer">
                                  </div>
                            </div>
                        </div>
                        <div class="col-3">
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
                        <div class="col-2">
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
                        <div class="col-2">
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
                    <div class="row mt-3">
                        <div class="col-5">
                            <div class="form-group">
                                <label class="mb-1" for="">Comentarios</label>
                                <textarea class="form-control" name="comentario" id="comentario" cols="8" rows="8"></textarea>
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
                <div class="row mt-5 ">
                    <div class="d-flex justify-content-center">
                        <button  id="btnAñadir" class="btn btn-dark" type="submit">Siguiente</button>
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