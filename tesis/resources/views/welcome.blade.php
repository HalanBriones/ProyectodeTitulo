@extends('layouts.plantilla')
    @php
    session_start(['name' => 'Login'])
    @endphp
@section('content')
    <div class="row mb-4">
        <div class="col">
            <button class="btn btn-dark" onclick="datosGrafico()" >Graficar</button>
        </div>
        <div class="col-2">
            <label for="">Año</label>
            <input class="form-control" type="number" id="año">
        </div>
    </div>  
    <div class="d-flex justify-content-center">
        <canvas id="myChart" class="col-8"></canvas>
    </div>

    <script>
    var producto = [];
    var veces = [];  
    function datosGrafico(){
        let fecha = document.getElementById("año").value
        console.log(fecha)
        let años = {fecha: fecha};
        console.log(años)   
        $.post("/graficos/datos",años,function (response) {
            console.log(response)
            for(var i=0;i< response.length;i++){
                producto.push(response[i]['producto'])
                veces.push(response[i]['cantidad'])
            }
            var ctx = document.getElementById('myChart').getContext('2d'); 
            var myPieChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
            labels: producto,
            datasets: [{
                label: '# of Votes',
                data: veces ,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
            },
            options: {
                scales: {
                }
            }
            });

        }).fail(function(error) { console.log(error.responseJSON) });

    }   

        //grafico
        if(producto == "" && veces==""){
            var ctx = document.getElementById('myChart').getContext('2d'); 
            var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
            labels: producto,
            datasets: [{
                label: '# of Votes',
                data: veces ,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
            });
        }


    </script>
    @include('sweetalert::alert')
@endsection