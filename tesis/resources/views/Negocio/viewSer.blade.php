@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div><h5>Vista Servicio</h5></div>
        </div>
        <div class="card-body">
            <form   id="formulario" method="POST" action="{{route('SerAsociado.edit',$ser_has_op)}}">
                @csrf
                 {{--Servicios--}}
                <div class="d-flex justify-content-end mb-3">
                    @foreach ($participantes as $par)
                        @if ($_SESSION['rut'] == $par->usuario_rut && ($_SESSION['nombre_rol'] == 'Comercial' || $_SESSION['nombre_rol'] == 'Administrador'))
                            <div class="m-2"><a  class="btn btn-secondary" href="{{route('ser.edit',$ser_has_op->id_ser_has_op)}}"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg></a></div>

                            <div class="m-2"><a href="{{route('comentario',$ser_has_op->id_ser_has_op)}}" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
                            <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        </svg>Comentar</a></div>

                        @endif

                    @endforeach
                </div>
                <div class="row">
                    {{-- Valor uf actual --}}
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
                                <textarea disabled class="form-control" name="comentario" id="comentario" cols="8" rows="8">{{$ser_has_op->comentarios}}</textarea>
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
 
