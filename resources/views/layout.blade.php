<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nodos</title>
    <!--Import Google Icon Font-->
    <link rel="stylesheet" href="{{asset('css/materialize-icons.css')}}">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}" media="screen,projection" />
    <link rel="stylesheet" href="/css/master.css">

    <script src="{{asset('/js/instascan.min.js')}}"></script>

</head>

<body>
    <header>
        <nav class="teal hide-on-large-only">
          <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>

            <div class="container nav-wrapper">
              <a href="{{route("home")}}" class="brand-logo center">
                <img src="{{asset("NCIE-logo.jpg")}}" style="width:100%" alt="">
              </a>
            </div>
        </nav>
        <ul id="slide-out" class="sidenav sidenav-fixed">
          <img src="NCIE-logo.jpg" style="width:100%" alt="">
          <li><a href="{{route("home")}}">Leer QR</a></li>
          <li><a href="{{route("users.index")}}">Usuarios</a></li>
          @if(auth()->guest())
            <li><a href="/login">Iniciar Sesión</a></li>
          @else
            <li><a href="/logout">Cerrar Sesión</a></li>
          @endif
        </ul>
    </header>
<main>
  <div class="wrapper">
    @yield('contenido')
  </div>
</main>
    <!--JavaScript at end of body for optimized loading-->
    <script src="{{asset('/js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/materialize.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/material-dialog.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/axios.min.js')}}"></script>
    <script src="{{asset('/js/tippy.min.js')}}"></script>


    <script type="text/javascript">M.AutoInit();</script>
    @yield('scripts')
</body>

</html>
