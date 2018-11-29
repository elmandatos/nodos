<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema de Registros de NCIE</title>
    <!-- Icono WebSite -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('NCIE3.ico')}}"/>
    <!--Import Google Icon Font-->
    <link rel="stylesheet" href="{{asset('css/materialize-icons.css')}}">
    <!--Import Font Awesome Icon Fonts-->
    <link rel="stylesheet" href="{{asset('css/fa_css/solid.css')}}">
    <!--Import materialize.css-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/materialize.min.css')}}" media="screen,projection" />
    <!-- CSS Modifica Materialize -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">
    <!-- Iconos Font Awesome  -->
    <script defer src="{{asset('js/fa_js/all.js')}}"></script>
    <script src="{{asset('/js/instascan.min.js')}}"></script>
</head>

<body>
    <header class="encabezado">
        <div class="logo">
          <a href="{{route("home")}}"><img src="../logo_Nodos.svg"></a>
        </div>
        <nav class="navegador teal">
            <div class="container nav-wrapper">
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="{{route("home")}}">Leer QR</a></li>
                @if(!auth()->guest())
                  <li><a href="{{route("users.index")}}">Usuarios</a></li>
                  {{-- <i class="material-icons">vpn_key</i> --}}
                @endif

                @if(auth()->guest())
                  <li><a href="/login">Iniciar Sesión</a></li>
                @else
                  <li><a href="/logout">Cerrar Sesión</a></li>
                @endif
              </ul>
            </div>
        </nav>
    </header>
    <div class="container">
      @yield('contenido')
    </div>
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
