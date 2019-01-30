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

<body id="main">
    <header>
        <div class="flex-container">
            <div class="NCIE_logo" style="flex-grow: 1">
                <a href="{{route("home")}}"><img src="{{asset('NCIE_logos/Logo_NCIE_Admin_System.png')}}"></a>
            </div>

            <div class="navegador" style="flex-grow: 8">
                <ul>
                @if(auth()->guest())
                    <li id="verde1"><a href="{{route("login")}}">Iniciar Sesión</a></li>
                @else
                    <li id="verde2"><a href="{{route("logout")}}">Cerrar Sesión</a></li>
                @endif
                @if(!auth()->guest())
                    <li class="{{ Request::is('users*') ? 'activaAzulClaro' : '' }}"id="azulClaro"><a href="{{route("users.index")}}">Usuarios</a></li>
                    <li class="{{ Request::is("almacen*") ? 'activaRosa' : '' }}" id="rosa"> <a href="{{route("almacen.index")}}">Almacen</a></li>
                    <li class="{{ Request::is("prestamos*") ? 'activaAmarillo' : '' }}" id="amarillo"> <a href="{{route("prestamos.index")}}">Prestamos</a></li>
                @endif
                    {{-- link nuevo --}}
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
    <script src="{{asset('/js/botonSideNav.js')}}"></script>
    @yield('scripts')
</body>
{{--     <ul id="slide-out" class="sidenav hid">
                    <li class="LogoExpand">
                        <a href="#"><img src="{{asset('NCIE_logos/SideNavExpand.png')}}"><i class="tiny material-icons">radio_button_checked</i></a>
                    </li>
                    <li><div class="divider"></div></li>
        @if(auth()->guest())
                    <li id="verde1"><a href="{{route("login")}}"><i class="material-icons" id="iconos">portrait</i>Iniciar Sesión</a></li>
                @else
                    <li id="verde2"><a href="{{route("logout")}}"><i class="material-icons" id="iconos">close</i>Cerrar Sesión</a></li>
                @endif
                @if(!auth()->guest())
                    <li class="{{ Request::is('users*') ? 'activaAzulClaro' : '' }}"id="azulClaro"><a href="{{route("users.index")}}"><i class="material-icons" id="iconos">contacts</i>Usuarios</a></li>
                @endif
                    
                    <li class="{{ Request::is("almacen*") ? 'activaRosa' : '' }}" id="rosa"> <a href="{{route("almacen.index")}}"><i class="material-icons" id="iconos">business_center</i>Almacen</a></li>
                    <li class="{{ Request::is("prestamos*") ? 'activaAmarillo' : '' }}" id="amarillo"> <a href="{{route("prestamos.index")}}"><i class="material-icons" id="iconos">today</i>Prestamos</a></li>
                    <li class="{{ Request::is("/") ? 'activaAzulMarino' : '' }}" id="azulMarino"><a href="{{route("home")}}"><i class="material-icons" id="iconos">camera</i>Leer QR</a></li>
                <li><div class="divider"></div></li>
    </ul> --}}
{{-- NAV BAR GRANDE --}}
<aside class="sidenav hid"  id="sidegrande">
        <div class="LogoExpand">
                <a href="#"><img src="{{asset('NCIE_logos/SideNavExpand.png')}}"></a>
                <a id="ajusteRadio" href="#"><i class="tiny material-icons" id="radioloco">radio_button_checked</i></a>
        </div>
        <ul id="slide-out">
                    <li><div class="divider"></div></li>
        @if(auth()->guest())
                    <li id="verde1"><a href="{{route("login")}}"><i class="material-icons" id="iconos">portrait</i>Iniciar Sesión</a></li>
                @else
                    <li id="verde2"><a href="{{route("logout")}}"><i class="material-icons" id="iconos">close</i>Cerrar Sesión</a></li>
                @endif
                @if(!auth()->guest())
                    <li class="{{ Request::is('users*') ? 'activaAzulClaro' : '' }}"id="azulClaro"><a href="{{route("users.index")}}"><i class="material-icons" id="iconos">contacts</i>Usuarios</a></li>
                    
                    <li class="{{ Request::is("almacen*") ? 'activaRosa' : '' }}" id="rosa"> <a href="{{route("almacen.index")}}"><i class="material-icons" id="iconos">business_center</i>Almacen</a></li>
                    <li class="{{ Request::is("prestamos*") ? 'activaAmarillo' : '' }}" id="amarillo"> <a href="{{route("prestamos.index")}}"><i class="material-icons" id="iconos">today</i>Prestamos</a></li>
                @endif
                    <li class="{{ Request::is("/") ? 'activaAzulMarino' : '' }}" id="azulMarino"><a href="{{route("home")}}"><i class="material-icons" id="iconos">camera</i>Leer QR</a></li>
                <li><div class="divider"></div></li>
    </ul>
</aside>
{{-- NAV BAR PEQUEÑA --}}
    <ul id="slide-out" class="sidenav show">
                    <li class="LogoColaps">
                        <a href="{{route("home")}}"><img src="{{asset('NCIE_logos/SideNavColaps.png')}}"></a>
                    </li>
                    <li><div class="divider"></div></li>
        @if(auth()->guest())
                    <li id="verde1"><a href="{{route("login")}}"><i class="material-icons" id="iconos">portrait</i></a></li>
                @else
                    <li id="verde2"><a href="{{route("logout")}}"><i class="material-icons" id="iconos">close</i></a></li>
                @endif
                @if(!auth()->guest())
                    <li class="{{ Request::is('users*') ? 'activaAzulClaro' : '' }}"id="azulClaro"><a href="{{route("users.index")}}"><i class="material-icons" id="iconos">contacts</i></a></li>
                    {{-- link nuevo --}}
                    <li class="{{ Request::is("almacen*") ? 'activaRosa' : '' }}" id="rosa"> <a href="{{route("almacen.index")}}"><i class="material-icons" id="iconos">business_center</i></a></li>
                    <li class="{{ Request::is("prestamos*") ? 'activaAmarillo' : '' }}" id="amarillo"> <a href="{{route("prestamos.index")}}"><i class="material-icons" id="iconos">today</i></a></li>
                @endif
                    <li class="{{ Request::is("/") ? 'activaAzulMarino' : '' }}" id="azulMarino"><a href="{{route("home")}}"><i class="material-icons" id="iconos">camera</i></a></li>
                {{-- <li><a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a></li> --}}
                <li><div class="divider"></div></li>
    </ul>
</html>
