<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Cinzel+Decorative&family=Philosopher&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./bootstrap.min.css">
    <title>Document</title>
    {{-- <style>

    table,
    th,
    {
        border: 1px solid black;
    }
    .div1{
        border: 1px solid black;
    }
     div{
        margin-top: 10px;
     }   
    .columna {
        width:50%;
        float:left;
        margin: 10px;
        justify-items: center;
    }
    .margin{
        margin-bottom: 30px;
    }

    .margin2{
        margin-top: 15px;
    }
    th,
    td {
        padding: 10px;
    }
    body{
        font-family: 'Cinzel', serif;
        margin: 0;
    }
    </style> --}}

    <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td{
        border: 1px solid #dddddd;
        text-align: left;
        font-size: 11px;
        padding: 8px;
        } 

        th {
        border: 1px solid #dddddd;
        text-align: left;
        font-size: 11px;
        padding: 8px;
        }

        tr {
            
        }
        
        thead{
            border: 2px solid #dddddd;
            background:#E5E7E9;

        }
        </style>
</head>

<body>
    <div class="container">
        <div style="text-align: center">
            <div class="">
                <h2 class="tamaño-titulo">{{$compañia[0]->nombre_negocio}}</h2>
            </div>
        </div>
        <div>
            <img src="" alt="">
        </div>
        <div class="" style="text-align: right">
            <p>Fecha : {{$date}}</p>
            <p>No. versión : 1.0</p>
        </div>

        <div class="columna">
            <h4>Empresa</h4>
            <table>
                <tr>
                    <td>Nombre de la Empresa</td>
                    <td>ITECHI</td>
                </tr>
                <tr>
                    <td>Domicilio</td>
                    <td>Paseo Ahumada 11, oficina 309</td>
                </tr>
                <tr>
                    <td>Ciudad</td>
                    <td>Santiago de Chile</td>
                </tr>
            </table>
        </div>
        <div  class="columna margin">
            <h4>Cliente</h4>
            <table>
                <tr>
                    <td>Compañia</td>
                    <td>{{$compañia[0]->compañia}}</td>
                </tr>
                <tr>
                    <td>Correo</td>
                    <td>{{$compañia[0]->correo}}</td>
                </tr>
                <tr>
                    <td>Domicilio</td>
                    <td>{{$compañia[0]->domicilio}}</td>
                </tr>
            </table>
        </div>
         @if (count($productos) > 0)
        <div class="margin2">
            <h3 style="text-align: center" class="margin2" >Productos</h3>
            <table style="width: 100%">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>DIVISA</th>
                        <th>NOMBRE PRODUCTO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO UNITARIO USD</th>
                        <th>PRECIO TOTAL USD</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($productos as $pro)
                    <tr>
                        <td></td>
                        <td>USD</td>
                        <td>{{$pro->nombre_producto}}</td>
                        <td>{{$pro->descripcion}}</td>
                        <td>{{$pro->cantidad_productos}}</td>
                        <td>{{$pro->precio_ventaPro/$pro->cantidad_productos}}</td>
                        <td>{{$pro->precio_ventaPro}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        @endif
        @if (count($servicios) > 0)
        <h3 style="text-align: center" >Servicios</h3>
        <div>
            <table style="width: 100%">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>DIVISA</th>
                        <th>NOMBRE SERVICIO</th>
                        <th>PRECIO TOTAL UF</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($servicios as $ser)
                    <tr style="text-align: center">
                        <td></td>
                        <td>UF</td>
                        <td>{{$ser->nombre_servicio}}</td>
                        <td>{{$ser->valor_total_cliente}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif 
    </div>
</body>
</html>

