@extends('layouts.plantilla')
    @php
    session_start(['name' => 'Login'])
    @endphp
@section('content')
<div class="jumbotron">
    <h5 class="display-6">Estadísticas de Productos y Servicios</h5>
    <hr class="my-4">
                {{-- MODAL --}}
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-dark m-2" data-toggle="modal" data-target="#exampleModalCenter">
                            Productos
                        </button>   
                        <button type="button" class="btn btn-dark m-2" data-toggle="modal" data-target="#miModal">
                            Servicios
                        </button>
                    </div>
                </div>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Productos Cotizados por año</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex justify-content-between">
                                <div class="col-2">
                                    <button id="graficar" class="btn btn-dark" >Graficar</button>
                                </div>
                                <div class="col-5">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Año</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="ano">
                                                <option value="">Seleccionar</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                            </select>
                                        </div>
                                  </div>
                                </div>
                            </div>  
                            <div id="padre" class="d-flex justify-content-center">
                                <canvas id="myChart" class="col-6" width="150" height="150"></canvas>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                 {{-- --FIN-- --}}
                  <!-- Modal -->
                  <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="myModalLabel">Servicios cotizados por año</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <div class="row d-flex justify-content-between">
                                <div class="col-2">
                                    <button id="graficar2" class="btn btn-dark" >Graficar</button>
                                </div>
                                <div class="col-5">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-2 col-form-label">Año</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="ano_servicio">
                                                <option value="">Seleccionar</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                            </select>
                                        </div>
                                  </div>
                                </div>
                            </div>  
                            <div id="padre2" class="d-flex justify-content-center">
                                <canvas id="myChart2" class="col-6" width="150" height="150"></canvas>
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
  </div>
    @include('sweetalert::alert')
    <script src="{{asset('js/grafico.js')}}"></script>
@endsection