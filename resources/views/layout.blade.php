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
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="{{asset('css/materialize.min.css')}}" media="screen,projection" />
    <!-- CSS Layout, QR, Users.index -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilo.css')}}">
    <script src="{{asset('/js/instascan.min.js')}}"></script>
    @yield('meta')
</head>

<body>
    <header>
        <div class="contenedor">
            <div class="NCIE_logo">
                <a href="{{route("home")}}"><img src="{{asset('NCIE_logos/Logo_NCIE_Admin_System.svg')}}"></a>
            </div>
            
            <div class="navegador">
                <ul>
                @if(auth()->guest())
                    <li id="verde1"><a href="{{route("login")}}">Iniciar Sesión</a></li>
                @else
                    <li id="verde2"><a href="{{route("logout")}}">Cerrar Sesión</a></li>
                @endif
                @if(!auth()->guest())
                    <li class="{{ Request::is('users*') ? 'activaAzulClaro' : '' }}"id="azulClaro"><a href="{{route("users.index")}}">Usuarios</a></li>
                @endif
                    {{-- link nuevo --}}
                    <li class="{{ Request::is("almacen*") ? 'activaRosa' : '' }}" id="rosa"> <a href="{{route("almacen.index")}}">Almacen</a></li>
                    <li class="{{ Request::is("prestamos*") ? 'activaAmarillo' : '' }}" id="amarillo"> <a href="{{route("prestamos.index")}}">Prestamos</a></li>
                    <li class="{{ Request::is("/") ? 'activaAzulMarino' : '' }}" id="azulMarino"><a href="{{route("home")}}">Leer QR</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container">
      @yield('contenido')
    </div>
    @yield('noContainer')
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
