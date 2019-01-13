<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Inicio de Sesión</title>
   <!--Import CSS de login-->
  <link rel="stylesheet" type="text/css" href="{{asset('css/login.blade.css')}}">
  <!--Import materialize.css-->
  <link rel="stylesheet" type="text/css" href="{{asset('css/materialize.min.css')}}" media="screen,projection" />
   <!--Import materialize-icons.css-->
  <link rel="stylesheet" href="{{asset('css/materialize-icons.css')}}">
</head>
<body>
  <div class="cabecera"></div>

  <div class="fila">
    <div class="columna_costados"></div>
      <div class="columna_principal">
        <div class="right-align columna_costados_interno">
           <a class="btn-floating btn-large waves-effect waves-light" href="{{ url()->previous() }}">
            <i class="material-icons">arrow_back</i>
          </a>
        </div>
          <form class="formulario" action="/login" method="POST">
            <a href="{{route("home")}}"><img src="../logo_Nodos.svg"></a>
              {{ csrf_field() }}
              <br>
              <div class="row" id="margen">
                <div class="input-field col s11">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="email" name="email" type="email" autofocus>
                  <label for="email">Correo</label>
                </div>
              </div>

              <div class="row margen" id="margen2">
                <div class="input-field col s11">
                  <i class="material-icons prefix">lock</i>
                  <input id="password" name="password" type="password">
                  <label for="password">Contraseña</label>
                </div>
              </div>
              <button class="boton" type="submit"><span>Iniciar Sesión </span></button>
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
