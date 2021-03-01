@extends('layouts.plantilla')
    @php
    session_start(['name' => 'Login'])
    @endphp
@section('content')
    <button class="btn btn-sm btn-dark" onclick="datosGrafico()" >Graficar</button>  
    <div class="d-flex justify-content-center">
        <canvas id="myChart" class="col-8"></canvas>
    </div>

    <script>
    function datosGrafico(){
        $.post("/graficos/datos", function (response) {
            var data = JSON.stringify(response)
            console.log(data)
            console.log(response[0]['nombre_producto'])
            var producto = [];
            var veces = [];   
            for(var i=0;i< response.length;i++){
                producto.push(response[i]['nombre_producto'])
                veces.push(response[i]['cantidad_usadoPro'])
            }

            console.log(producto)
            console.log(veces)
            //grafico
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
        }).fail(function(error) { console.log(error.responseJSON) });
    }

    </script>
    @include('sweetalert::alert')
@endsection