<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>ITECHI</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">
    <!-- Custom styles for this template -->
<link href="form-validation.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
<!-- Custom styles for this template -->
<link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>
<body class="">
    @include('layouts.header')
    <div class="container">
      <form method="POST" action="{{route('solicitud.store')}}">
        @csrf
        <h3 class="text-center m-4 mb-2">Datos Personales</h3>
          <div class="row d-flex justify-content-center" >
            <div class="col-sm-4">
                <div class="form-group mb-2">
                    <label class="mb-1" for="nombre_cliente">Nombre</label>
                    <input   type="text" class="form-control" placeholder="Nombre del Cliente" name="nombre_cliente" id="nombre_cliente" required>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group mb-2">
                    <label class="mb-1" for="apellido_cliente">Apellido</label>
                    <input   type="text" class="form-control" placeholder="Dirección del Cliente o Compañia" name="apellido_cliente" id="apellido_cliente" required>
                </div>
            </div>
          </div>
        <div class="row d-flex justify-content-center">
            <div class="col-sm-4">
                <div class="form-group mb-2">
                    <label class="mb-1" for="correo_cliente">Correo</label>
                    <input   type="email" class="form-control" placeholder="Correo del Cliente o Compañia" name="correo_cliente" id="correo_cliente" required>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label class=" mb-1" for="telefono_cliente">Teléfono</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <div class="input-group-text">+569</div>
                        </div>
                        <input type="number" placeholder="Teléfono del cliente" class="form-control" name="telefono_cliente" id="telefono_cliente">
                    </div>
                </div>
            </div>
        </div>
        <h3 class="text-center m-4 mb-2">¿Que Productos y/o Servicios desea Cotizar?</h3>
            
        <div class="row">
          {{-- acordeon izquierda --}}
          <div class="col ">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Productos
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <table class="table row d-flex justify-content-center">
                      <thead class="">
                        <tr>
                          <th scope="col">Nombre Producto</th>
                          <th scope="col">Marca</th>
                          <th scope="col">Tipo de Producto</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody class="">
                        <tr hidden><td><input checked type="checkbox" name="productos[]" value="0"></td></tr>
                          @foreach ($productos as $pro)
                          <tr>
                            <td>{{$pro->nombre_producto}}</td>
                            <td>{{$pro->nombre_marca}}</td>
                            <td>{{$pro->nombre_tipo_producto}}</td>
                            <td><input type="checkbox" name="productos[]" id="productos" value="{{$pro->idproducto}}"></td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- acordeon derecha --}}
          <div class="col">
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button btn btn-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Servicios
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <table class="table row d-flex justify-content-center">
                      <thead class="">
                        <tr>
                          <th scope="col">Nombre Servicio</th>
                          <th scope="col">Conocimiento</th>
                          <th scope="col">ID Chile Compra</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr hidden><td><input checked type="checkbox" name="servicios[]" value="0"></td></tr>
                          @foreach ($servicios as $ser)
                          <tr>
                            <td>{{$ser->nombre_servicio}}</td>
                            <td>{{$ser->conocimiento}}</td>
                            <td>{{$ser->idChileCompra}}</td>
                            <td><input type="checkbox" name="servicios[]" id="servicios" value="{{$ser->idservicio}}"></td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-4 row d-flex justify-content-center">
          <button class="btn btn-dark" type="submit">Enviar</button>
        </div>
      </form>
      @include('sweetalert::alert')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="form-validation.js"></script>
</body>
</html>






