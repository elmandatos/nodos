<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inicio de Sesion</title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/login.blade.css')}}">
</head>
<body background="{{asset('fondo.jpg')}}">
  {{-- <h1>Inicio de Sesion</h1> --}}
  <div class="cabecera">
  </div>

  <div class="fila">
    <div class="columna_costados"></div>
      <div class="columna_principal">
        <div class="columna_costados_interno"></div>
          <form class="formulario" action="/login" method="POST">
            <a href="{{route("home")}}"><img src="../logo_Nodos.svg"></a>
              {{ csrf_field() }}
              <br>
              <input type="email" name="email" placeholder="Correo"><br>
              <input type="password" name="password" placeholder="Contraseña"><br><br>
              <input class="boton" type="submit" value="Iniciar Sesion">
              <br><br>
          </form>
        <div class="columna_costados_interno"></div>
      </div>
      <div class="columna_costados"></div>
  </div>

</body>
</html>
