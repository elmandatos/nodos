<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Nodos</title>
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
        <script src="/js/jquery-3.3.1.min.js"></script>
        <script src="/js/instascan.min.js"></script>
        <script src="/js/password.js" type="text/javascript"></script>
        <script src="/js/p5.js" type="text/javascript"></script>
        <script src="/js/p5.dom.js" type="text/javascript"></script>
        <script src="/js/p5.sound.js" type="text/javascript"></script>
    </body>
</html>
