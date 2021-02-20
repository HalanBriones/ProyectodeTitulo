@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div><h5>Editar Servicio</h5></div>
        </div>
        <div class="card-body">
            <form   id="formulario" method="POST" action="{{route('comentario.save',$ser_has_op)}}">
                @csrf
                 {{--Servicios--}}
                <div class="row">
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="servicio">Servicio</label>
                                <select disabled class="form-control" name="servicio" id="servicio">
                                    <option value="{{$servicio->idservicio}},{{$servicio->nombre_servicio}}">{{$servicio->nombre_servicio}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="">Conocimiento</label>
                                <select disabled class="form-control" name="conocimiento" id="conocimiento">
                                    <option  value="{{ $conocimiento->idconocimiento_servicio}},{{$conocimiento->nombre_conocimiento}}">{{$conocimiento->nombre_conocimiento}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="">Comercialización</label>
                                <select disabled class="form-control" name="comercializacionservicio" id="comercializacionservicio">
                                    <option value="{{$comercializacion->idcomercializacion_servicio}},{{$comercializacion->nombre_comercializacion}}" selected>{{$comercializacion->nombre_comercializacion}}</option>
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
                                    <input disabled step="any"  type="number" class="form-control" name="valor_cliente_hora" id="valor_cliente_hora" value="{{$ser_has_op->valor_cliente_hora}}">
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
                                    <input disabled step="any" value="{{$ser_has_op->valor_total_cliente}}" type="number" class="form-control" name="precioSventa" id="precioSventa">
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
                                    <input disabled step="any" value="{{$ser_has_op->valor_venta_mes}}" type="number" class="form-control" name="valor_venta_mes" id="valor_venta_mes">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mb-3" id="primer-div">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="mb-1" for="cantidad_hora">Cantidad horas totales</label>
                                <input disabled class="form-control"  onchange="servicios()" type="number" name="cantidad_hora" id="cantidad_hora" value="{{$ser_has_op->cantidad_horas}}">

                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="n_meses">Numero meses</label>
                                <input disabled value="{{$ser_has_op->meses}}" type="number" class="form-control" onchange="servicios()" name="n_meses" id="n_meses">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="sr-only mb-1" for="valor_venta_mes">Precio Total Cliente CLP</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <div class="input-group-text">$</div>
                                    </div>
                                    <input disabled step="any" value="{{$ser_has_op->valor_total_cliente_clp}}" type="number" class="form-control" name="valor_total_cliente_clp" id="valor_total_cliente_clp">
                                </div>
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
                                    <input disabled value="{{$ser_has_op->costo_hora}}" type="number" class="form-control" onchange="servicios()" name="costoxhora" id="costoxhora">
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
                                    <input disabled step="any" value="{{$ser_has_op->costo_total_mes}}" type="number" class="form-control" name="costo_total_mes" id="costo_total_mes">
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
                                    <input disabled step="any" value="{{$ser_has_op->costo_totalSer}}" type="number" class="form-control" name="costo_total" id="costo_total">
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
                                    <input disabled step="any" value="{{$ser_has_op->costo_totalSer_clp}}" type="number" class="form-control" name="costo_totalSer_clp" id="costo_totalSer_clp">
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
                                    <input disabled step="any" value="{{$ser_has_op->costo_total_mes_clp}}" type="number" class="form-control" name="costo_total_mes_clp" id="costo_total_mes_clp">
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
                                    <input disabled step="any" value="{{$ser_has_op->utilidadSer}}" type="number" class="form-control" name="utilidadSer" id="utilidadSer">
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
                                    <input disabled step="any" value="{{$ser_has_op->ganancia_vendedorSer}}" type="number" class="form-control" onchange="servicios()" name="gananciaSer" id="gananciaSer">
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
                                    <input disabled step="any" value="{{$ser_has_op->ganancia_vendedorSer_clp}}" type="number" class="form-control" name="ganancia_vendedorSer_clp" id="ganancia_vendedorSer_clp">
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
                                    <input disabled value="{{$ser_has_op->margen_negocioSer}}"  type="number" onchange="servicios()" class="form-control" name="margen_negocioSer" id="margen_negocioSer">
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
                                    <input disabled value="{{$ser_has_op->margen_vendedorSer}}" type="number" onchange="servicios()" class="form-control" name="margen_vendedorSer" id="margen_vendedorSer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-5">
                            <div class="form-group">
                                <label class="mb-1" for="">Comentarios</label>
                                <textarea class="form-control" name="comentario" id="comentario" cols="8" rows="8">{{$ser_has_op->comentarios}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
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
 
