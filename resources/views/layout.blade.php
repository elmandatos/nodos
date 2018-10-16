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
    <script src="{{asset('/js/instascan.min.js')}}"></script>

</head>

<body>
    <header>
        <nav>
            <div class="container nav-wrapper">
              <a href="{{route("home")}}" class="brand-logo">Logo</a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="{{route("home")}}">Leer QR</a></li>
                <li><a href="{{route("users.index")}}">Usuarios</a></li>
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
    <script src="{{asset('/js/materialize.min.js')}}/" type="text/javascript"></script>
    <script type="text/javascript">M.AutoInit();</script>
    @yield('scripts')
</body>

</html>
