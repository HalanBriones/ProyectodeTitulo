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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    {{-- cdn jquery --}}
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-sm-block sidebar">
        <div class="position-sticky d-flex justify-content-center pt-4">
          {{-- prueba --}}
              <ul class="list-unstyled components mb-5">
                <li class="active">
                  <a style="text-decoration: none" id="User" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="btn-lg dropdown-toggle nav-link"><svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="18" height="18" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
                  </svg>Usuario</a>
                  <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li class="nav-item">
                      <a id="verUser" class="btn-md nav-link" href="/mostrar" >Ver Usuarios</a>
                    </li>
                    <li>
                      <a id="registerUser" class="nav-link" href="/registro">Registrar usuarios</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a style="text-decoration: none" id="Pro" href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="btn-lg dropdown-toggle nav-link"><svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="18" height="18" fill="currentColor" class="bi bi-bag-check-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                  </svg>Producto</a>
                  <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li>
                      <a id="verPro" class="nav-link" href="/productos">Productos</a>
                    </li>
                    <li>
                      <a id="verMac" class="nav-link" href="/marcas/view">Marcas</a>
                    </li>
                    <li>
                      <a id="verComerPro" class="nav-link" href="/comercializaciones">Comercialización</a>
                    </li>
                    <li>
                      <a id="verTP" class="nav-link" href="/tipo-productos">Tipo Producto</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a style="text-decoration: none" id="Ser" href="#SerSubmenu" data-toggle="collapse" aria-expanded="false" class="btn-lg dropdown-toggle nav-link"><svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="18" height="18" fill="currentColor" class="bi bi-headset" viewBox="0 0 16 16">
                    <path d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5z"/>
                  </svg>Servicio</a>
                  <ul class="collapse list-unstyled" id="SerSubmenu">
                    <li>
                      <a id="verSer" class="nav-link" href="/servicios">Servicios</a>
                    </li>
                    <li>
                      <a id="verConoc" class="nav-link" href="/conocimientos">Conocimiento</a>
                    </li>
                    <li>
                      <a id="verComerSer" class="nav-link" href="/comercializaciones-ser">Comercialización</a>
                    </li>
                  </ul>
                </li>
                <li>
                  <a id="verSol" class="btn-lg nav-link" href="/solicitudes"><svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="18" height="18" fill="currentColor" class="bi bi-justify-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-4-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z"/>
                  </svg>Solicitudes</a>
                </li>
                <li>
                  <a style="text-decoration: none" id="Op" href="#NegocioSubmenu" data-toggle="collapse" aria-expanded="false" class="btn-lg dropdown-toggle nav-link"><svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="18" height="18" fill="currentColor" class="bi bi-briefcase-fill" viewBox="0 0 16 16">
                    <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/>
                    <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
                  </svg>Negocio</a>
                  <ul class="collapse list-unstyled" id="NegocioSubmenu">
                    <li>
                      <a id="verOP" class="nav-link" href="/verNegocios">Negocios</a>
                    </li>
                    <li>
                      <a id="verEstado" class="nav-link" href="/estados">Estado</a>
                    </li>
                  </ul>
                </li>
              </ul>
        </div>
      </nav>
    </div>
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
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

  <script src="{{asset('js/active-sidebar.js')}}"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>
