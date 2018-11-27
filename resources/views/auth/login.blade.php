<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inicio de Sesion</title>
  <link rel="stylesheet" type="text/css" href="{{asset('css/login.blade.css')}}">
  <link rel="stylesheet" href="{{asset('css/materialize-icons.css')}}">
  <!--Import Font Awesome Icon Fonts-->
  <link rel="stylesheet" href="{{asset('css/fa_css/solid.css')}}">
  <!--Import materialize.css-->
  <link rel="stylesheet" type="text/css" href="{{asset('css/materialize.min.css')}}" media="screen,projection" />
</head>
<body>
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
              {{-- <input type="email" name="email" placeholder="Correo"><br> --}}
              {{-- <input type="password" name="password" placeholder="Contraseña"><br><br> --}}
              <div class="row">
                <div class="input-field col s11">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="correo" type="email" class="validate" autofocus>
                  <label for="correo">Correo</label>
                  <span class="helper-text" data-error="Correo no válido"></span>
                </div>
              </div>

              <div class="row">
                <div class="input-field col s11">
                  <i class="material-icons prefix">lock</i>
                  <input id="contraseña" type="password">
                  <label for="contraseña">Contraseña</label>
                </div>
              </div>
              <input class="boton" type="submit" value="Iniciar Sesion">
              <br><br>
          </form>
        <div class="columna_costados_interno"></div>
      </div>
      <div class="columna_costados"></div>
  </div>
  <script src="{{asset('/js/jquery-3.3.1.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/js/materialize.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('/js/material-dialog.min.js')}}" type="text/javascript"></script>
</body>
</html>
