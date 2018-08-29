<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <style>
            a:link{
                text-decoration: none;
            }

            .error{
                color: red;
                font-size: 12px;
            }
        </style>
        <title></title>
    </head>
    <body>
        <header>
            <nav>
                <a href="{{route("home")}}">
                    <img src="/descarga.jpg" alt="">
                </a>
                <a  href="{{route("home")}}">Leer QR</a>
                <a  href="{{route("users.index")}}">Usuarios</a>
                @if(auth()->guest())
                    <a href="/login">Iniciar Sesión</a>
                @else
                    <a href="/logout">Cerrar Sesión</a>
                @endif
            </nav>
        </header>
        @yield('contenido')
        <footer>Copyright {{ date('Y')}}</footer>
    </body>
</html>
