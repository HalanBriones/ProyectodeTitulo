<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel&family=Cinzel+Decorative&family=Philosopher&display=swap" rel="stylesheet">
    <title>Document</title>
    <style>
        body{
            font-family: 'Cinzel', serif;
            margin: 0;
        }
        th{
            font-size: 14px;
            margin: 9px;
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
        <div style="text-align: right">
            <p>Fecha : {{$date}}</p>
            <p>No. versión : 1.0</p>
        </div>

        <h4 style="text-align: center">Empresa</h4>
        <div style="text-align: initial">
            <p>Nombre de la empresa: ITECHI </p> 
            <p>Domicilio:  Paseo Ahumada 11, Oficina 309</p>
            <p>Ciudad : Santiago de Chile</p>
        </div>
        <h4 style="text-align: center">Cliente</h4>
        <div style="text-align: initial">
            <p>Compañía:{{$compañia[0]->compañia}}</p>
            <p>Correo: {{$compañia[0]->correo}}</p>
            <p>Domicilio:{{$compañia[0]->domicilio}}</p>
        </div>
         @if (count($productos) > 0)
        <h3 style="text-align:center">Productos</h3>
        <div>
            <table style="width: 100%">
                <thead>
                    <tr>
                        <th>CODIGO</th>
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
                        <th>NOMBRE SERVICIO</th>
                        <th>PRECIO TOTAL UF</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($servicios as $ser)
                    <tr style="text-align: center">
                        <td></td>
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

