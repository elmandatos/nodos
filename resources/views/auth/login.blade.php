<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inicio de Sesion</title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
</head>
<body>
  {{-- <h1>Inicio de Sesion</h1> --}}
  <div class="cabecera">
    <a href="{{route("home")}}"><img src="../logo_Nodos.svg"></a>
  </div>

  <div class="fila">
    <div class="columna_costados"></div>
      <div class="columna_principal">
        <div class="columna_costados_interno"></div>
          <form class="formulario" action="/login" method="POST">
              {{ csrf_field() }}
              <input type="email" name="email" placeholder="Correo"><br>
              <input type="password" name="password" placeholder="Password"><br><br>
              <input type="submit" value="Entrar">
          </form>
        <div class="columna_costados_interno"></div>
      </div>
      <div class="columna_costados"></div>
  </div>

</body>
</html>
