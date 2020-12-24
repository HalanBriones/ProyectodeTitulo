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
<style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

    
    <!-- Custom styles for this template -->
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>
<body class="">
    @include('layouts.header')

  <div class="container">

    <div class="mt-20">
        <form action="Post">
           <fieldset class="mt-5 mb-5">
               <legend class="mb-4">Datos Personales</legend>
                <div class="row">
                    <div class="col">
                        <div class="form-group row">
                            <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="nombre">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="correo" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="correo">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group row">
                            <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="apellido" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telefono" class="col-sm-2">Teléfono</label>
                            <div class="input-group col-sm-10">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend">+569</span>
                            </div>
                            <input type="number" class="form-control" id="telefono" aria-describedby="inputGroupPrepend" required>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset class="mt-5 mb-4">

                <div class="row">
                    <div class="col">
                        <legend class="mb-5">Productos</legend>
                        <div class="form-group row">
                            <label for="apellido" class="col-sm-2 col-form-label">Tipo de Productos</label>
                            <div class="col-sm-10">
                              <select name="producto" id="producto" class="form-control">
                                  <option value="01">caca</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido" class="col-sm-2 col-form-label">Productos</label>
                            <div class="col-sm-10">
                              <select name="producto" id="producto" class="form-control">
                                  <option value="01">caca</option>
                              </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <legend class="mb-5">Servicios</legend>
                        <div class="form-group row">
                            <label for="apellido" class="col-sm-2 col-form-label">Servicios</label>
                            <div class="col-sm-10">
                              <select name="servicios" id="servicios" class="form-control">
                                  <option value="01">pichi</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido" class="col-sm-2 col-form-label">Nivel Especialista</label>
                            <div class="col-sm-10">
                              <select name="servicios" id="servicios" class="form-control">
                                  <option value="01">pichi</option>
                              </select>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <div class=" row align-items-center">
                <div class="col text-center">
                    <input type="button" class="center btn btn-dark mt-4 mb-4" value="Solicitar Contacto">
                    <input type="submit" class="center btn btn-dark mt-4 mb-4" value="Enviar Solicitud">
                </div>
            </div>
        </form>
    </div>
    @include('sweetalert::alert')
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="form-validation.js"></script></body>
</html>






