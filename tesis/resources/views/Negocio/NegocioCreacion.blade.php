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
            <form   id="formulario">
                @csrf
                {{-- datos principales --}}
                <div class="row">
                    {{-- izquierda --}}
                    <div class="col ">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="nombre_negocio">Nombre Negocio</label>
                            <input   type="text" class="form-control" placeholder="Nombre Negocio" name="nombre-negocio" id="nombre_negocio">
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
                        <div class="form-group">
                            <label class="mb-1" for="">Sku</label>
                            <input type="text" class="form-control" name="sku" id="sku">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="mb-1" for="">Part Number</label>
                            <input type="text" class="form-control" name="partnumber" id="partnumber">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label class="mb-1" for="">Comercialización</label>
                            <select class="form-control" name="comercializacionproducto" id="comercializacionproducto">
                                <option value="" selected>Seleccione Comercializacion</option>
                                @foreach ($comercializaciones as $comercializacion)
                                <option value="{{$comercializacion->idComercializacion}} {{$comercializacion->nombre_comercializacion}}">{{$comercializacion->nombre_comercializacion}}</option>    
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="precioPcosto">Costo</label>
                                <input class="form-control " type="number" name="precioPcosto" id="precioPcosto">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="margen_negocioPro">Margen Negocio</label>
                                <input class="form-control " type="number" name="margen_negocioPro" id="margen_negocioPro">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="precioPventa">Precio Venta</label>
                                <input class="form-control " type="number" name="precioPventa" id="precioPventa">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="utilidadPro">Utilidad</label>
                                <input class="form-control " type="number" name="utilidadPro" id="utilidadPro">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="margen_vendedorPro">Margen Vendedor</label>
                                <input class="form-control " type="number" name="margen_vendedorPro" id="margen_vendedorPro">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
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
                    <table class="table">
                        <thead>
                            <th>Producto</th>
                            <th>Comercializacion</th>
                            <th>Sku</th>
                            <th>Part Number</th>
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
                                        <option value="{{$servicio->idServicio}}">{{$servicio->nombre_servicio}}</option>
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
                                <label class="mb-1" for="">Comercialización</label>
                                <select class="form-control" name="comercializacionservicio" id="comercializacionservicio">
                                    <option value="" selected>Seleccione Comercializacion</option>
                                    @foreach ($comercializacionSer as $comercializacionS)
                                    <option value="{{$comercializacionS->idComer_servicio}} {{$comercializacionS->nombre_comercializacion_ser}}">{{$comercializacionS->nombre_comercializacion_ser}}</option>    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label class="mb-1" for="costoxhora">Costo por Hora</label>
                            <input class="form-control " type="number" name="costoxhora" id="costoxhora">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="mb-1" for="cantidad_hora">Cantidad horas</label>
                            <input class="form-control " type="number" name="cantidad_hora" id="cantidad_hora">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label class="mb-1" for="costo_total">Costo total UF</label>
                            <input class="form-control " type="number" name="costo_total" id="costo_total">
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="margen_negocioSer">Margen Negocio</label>
                                <input class="form-control " type="number" name="margen_negocioSer" id="margen_negocioSer">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="precioSventa">Precio Venta</label>
                                <input class="form-control " type="number" name="precioSventa" id="precioSventa">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label class="mb-1" for="">Utilidad</label>
                                <input class="form-control " type="number" name="utilidadSer" id="utilidadSer">
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
                    <table class="table">
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
                <div class="row mt-3 ">
                    <div class="d-flex justify-content-center">
                        <button onclick="enviar()"  id="btnEnviar" class="btn btn-dark" type="submit">Siguiente</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="{{'js/negocio.js'}}"></script>
@endsection