@extends('layouts.plantilla')
@php
    session_start(['name' => 'Login']);
@endphp
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div><p>Creacion Negocio</p></div>
        </div>
        <div class="card-body">
            <form   id="formulario" method="POST" action="{{route('negocio.store')}}">
                @csrf
                {{ csrf_field() }} 
                {{-- datos principales --}}
                <div class="row">
                    {{-- izquierda --}}
                    <div class="col ">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="nombre_negocio">Nombre Negocio</label>
                            <input   type="text" class="form-control" placeholder="Nombre Negocio" name="nombre_negocio" id="nombre_negocio" required>
                        </div>
                    </div>
                  {{-- derecha --}}
                  <div class="col">
                    <div class="form-group mb-2">
                        <label class="mb-1" for="">Descripción</label>
                        <textarea  class="form-control" name="descripcion" id="descripcion" cols="6" rows="5"></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-end">
                        <input class="mt-4" multiple type="file" name="archivo" id="archivo" onchange="archivos()">
                    </div>
                </div>
                {{--Productos--}}
                <div class="d-flex justify-content-center mb-3 mt-3">
                    <h3>Agregar Productos a Oportunidad de Negocio</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="">Producto</label>
                            <select class="form-control" name="producto" id="producto">
                                <option value="" selected>Seleccione Producto</option>
                                @foreach ($productos as $producto)
                                    <option value="{{$producto->idproducto}} {{$producto->nombre_producto}}">{{$producto->nombre_producto}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="">Comercialización</label>
                            <select class="form-control" name="comercializacionproducto" id="comercializacionproducto">
                                <option hidden selected>Seleccione Comercializacion</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-2">
                            <div class="form-group">
                                <label class="mb-1" for="precioPcosto">Costo USD</label>
                                <input class="form-control" onkeyup="preciosProducto()" type="number" name="precioPcosto" id="precioPcosto">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="mb-1" for="margen_negocioPro">Margen</label>
                                <input class="form-control" placeholder="%0" onkeyup="preciosProducto()" type="number" name="margen_negocioPro" id="margen_negocioPro">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="mb-1" for="margen_vendedorPro">Margen Vendedor</label>
                                <input class="form-control " placeholder="%0" type="number" name="margen_vendedorPro" id="margen_vendedorPro">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="mb-1" for="meses">N°meses</label>
                                <input  class="form-control " type="number" onkeyup="preciosProducto()" name="meses" id="meses">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label class="mb-1" for="preciomes">Precio mes</label>
                                <input  class="form-control " type="number" onkeyup="preciosProducto()" name="preciomes" id="preciomes">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-3">
                            <div class="form-group">
                                <label class="mb-1" for="precioPventa">Precio Venta Producto</label>
                                <input disabled class="form-control " type="number" name="precioPventa" id="precioPventa">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="mb-1" for="utilidadPro">Utilidad Neta</label>
                                <input disabled class="form-control " type="number" name="utilidadPro" id="utilidadPro">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="mb-1" for="">Configuración</label>
                                <textarea class="form-control" name="configuracion" id="configuracion" cols="8" rows="8"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                {{--Agregar mas productos pendiente--}}
                <div class="row">
                    <div class="d-flex justify-content-end mb-4">
                        <button onclick="insertPro(event)" class="btn btn-dark">+</button>
                    </div>
                </div>
                <form >
                    <table class="table mt-3 mb-3">
                        <thead>
                            <th>Producto</th>
                            <th>Comercializacion</th>
                            <th>Costo USD</th>
                            <th>Precio Venta</th>
                        </thead>
                        <tbody  id="+pro">

                        </tbody>
                    </table>
                </form>
                {{--Servicios--}}
                 <div class="d-flex justify-content-center mb-3 mt-3">
                    <h3>Servicios</h3>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-2">
                                <label class="mb-1" for="servicio">Servicio</label>
                                <select class="form-control" name="servicio" id="servicio">
                                    <option value="" selected>Seleccione Servicio</option>
                                    @foreach ($servicios as $servicio)
                                        <option value="{{$servicio->idservicio}}">{{$servicio->nombre_servicio}}</option>
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
                                    <option value="{{ $conocimiento->idConocimiento}} {{$conocimiento->nombre_conocimiento}}" data-value="{{$conocimiento->nombre_conocimiento}}">{{$conocimiento->nombre_conocimiento}}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label class="mb-1" for="">Tipo Comercialización</label>
                                <select class="form-control" name="comercializacionservicio" id="comercializacionservicio">
                                    <option value="" selected>Seleccione Comercializacion</option>
                                    @foreach ($comercializacionSer as $comercializacionS)
                                    <option value="{{$comercializacionS->idcomercializacion_servicio}} {{$comercializacionS->nombre_comercializacion}}">{{$comercializacionS->nombre_comercializacion}}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label class="mb-1" for="costoxhora">Costo por Hora</label>
                            <input class="form-control" placeholder="0.00" onkeyup="preciosServicio()" type="number" name="costoxhora" id="costoxhora">
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
                            <label class="mb-1" for="costo_total">Costo total UF</label>
                            <input disabled class="form-control " type="number" name="costo_total" id="costo_total">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="mb-1" for="margen_negocioSer">Margen Servicio %</label>
                            <input class="form-control" onkeyup="preciosServicio()" type="number" name="margen_negocioSer" id="margen_negocioSer">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="costo_total">Valor cliente hora</label>
                                <input disabled class="form-control " type="number" name="valor_cliente_hora" id="valor_cliente_hora">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="precioSventa">Valor Total Cliente UF</label>
                                <input disabled class="form-control " type="number" name="precioSventa" id="precioSventa">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="">Utilidad Unitaria</label>
                                <input disabled class="form-control " type="number" name="utilidadSer" id="utilidadSer">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="margen_vendedorSer">Margen Vendedor</label>
                                <input class="form-control " type="number" name="margen_vendedorSer" id="margen_vendedorSer">
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
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-end mb-4">
                            <button onclick="insertSer(event)" class="btn btn-dark">+</button>
                        </div>
                    </div>
                </div>
                <form >
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
                <div class="row mt-3">
                    <div class="col mt-4">
                        <div class="d-flex justify-content-center">
                            <h4>Participantes del Negocio</h4>
                        </div>    
                        <div  class="form-check">
                            @foreach ($usuarios as $usuario)
                                <input  type="checkbox" value="{{$usuario->rut}}" class="ml-2 form-check-input" name="participante[]">{{$usuario->nombre}} {{$usuario->apellido}} <br>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="row mt-3 ">
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