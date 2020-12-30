<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>ITECHI</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

        <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

  <meta name="theme-color" content="#7952b3">
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
<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-2 text-center"href="/inicio"><h5>ITECHI</h5></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <nav class="navbar-expand-lg">
      <div class="navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-white" href="{{route('usuarios.editPerfil',$_SESSION['rut'])}}">{{$_SESSION['nombre']}}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{route('logout')}}">Salir</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            
            @if ($_SESSION['perfil'] == 'Administrador')
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="/registro">
                <span data-feather="home"></span>
                Registrar Usuarios
              </a>
            </li>
            @endif
            
            <li class="nav-item">
              <a class="nav-link" href="/mostrar">
                <span data-feather="file"></span>
                Usuarios
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/productos">
                <span data-feather="shopping-cart"></span>
                Productos
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/servicios">
                <span data-feather="users"></span>
                Servicios
              </a>
            </li>
            @if ($_SESSION['perfil'] == 'Administrador')
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="bar-chart-2"></span>
                Solicitudes
              </a>
            </li>
            @endif
            @if ($_SESSION['perfil'] == 'Administrador')
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="layers"></span>
                Negocios
              </a>
            </li>
            @endif
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex flex-row  justify-content-between">
          <div class="pt-2">
            <p>Bienvenido  {{$_SESSION['nombre']}}</p>
          </div>
          <div class="">
            <img src="{{asset('img/ITECHI1.png')}}" alt="no se ve" height="40" width="180">
          </div>
        </div>
        @yield('content')
      </main>
    </div>
  </div>
  @include('sweetalert::alert')
</body>
</html>
