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

        hr{
		page-break-after: always;
		border: none;
		margin: 0;
		padding: 0;
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
        <hr>
        <h4>Términos</h4>
        <p>Los siguientes términos aplican para toda la propuesta sin excepción, a menos que lo especifique el párrafo en cuestión</p>
        
        <h4>A. Divisa</h4>
        <p>Todos los precios incluidos en este documento pueden estar expresados en:</p>
        <p>Unidades de fomento (UF)</p>
        <p>Dólar observado (USD)</p>

        <h4>B. Condiciones de pago para la facturación</h4>
        <p>Los valores expresados en UF, (Unidades de Fomento), serán pagaderos por el cliente en su
            equivalente en moneda nacional chilena al momento de facturación, conforme al tipo de
            cambio de la Unidad de Fomento publicado por el Banco Central de Chile.
            Los valores expresados en Dólares (Dólar observado), serán pagaderos por el cliente en su
            equivalente en moneda nacional chilena al momento de facturación, conforme al tipo de
            cambio del Dólar observado publicado por el Banco Central de Chile.
        </p>

        <h4>C. Variaciones</h4>
        <p>
            Los cambios requeridos por el cliente durante la ejecución de los trabajos deberán ser
            solicitados por escrito mediante el Procedimiento de Control de Cambio.
            I T E C H I ™ evaluará el alcance del cambio e informará por escrito al cliente el impacto
            en los plazos y la variación del precio en el caso de haberlo, para su aprobación previa a la
            realización de los mismos.

        </p>

        <h4>D. Exclusiones</h4>
        <p>Todo trabajo, servicio o equipo que no esté expresamente detallado en la presente
            propuesta.
        </p>

        <h4>E. Restricciones del uso</h4>
        <p>La presente propuesta es propiedad de I T E C H I ™ y se entrega al cliente para su
            evaluación. La utilización de este documento se encuentra limitada al uso descrito, sin
            perjuicio de los derechos de I T E C H I ™ de utilizarla ampliamente en virtud de ser
            consecuencia de la aplicación de conceptos, ideas y técnicas de trabajo de su propiedad
            para dar solución al problema planteado por el cliente.
        </p>

        <h4>F. Exclusividad</h4>
        <p>Este documento ha sido preparado para el uso exclusivo del cliente. Se considera, por lo
            tanto, que éste es propiedad de I T E C H I ™ y no podrá, sin su consentimiento previo y
            por escrito, ser puesto a disposición de cualquier otra persona o entidad que no sea el
            destinatario del mismo o las personas designadas por él para el solo propósito de evaluar o
            implantar los servicios ofrecidos en él</p>

        <h4>G. Acuerdo de Confidencialidad</h4>
        <p>
            La información contenida en el presente documento es confidencial y no podrá ser
            reproducida sin el consentimiento escrito de I T E C H I ™
        </p>

    </div>
</body>
</html>

