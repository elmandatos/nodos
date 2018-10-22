@extends('layout')
@section('contenido')
  <div class="row"></div>
  <div class="row">
      <div class="col l4">
        <label style="font-size:15px;">Camara</label>
          <div id="canvasParent"></div>
          <button class="btn" id="capturar">Capturar
            <i class="material-icons right">photo_camera</i>
          </button>
      </div>
      <div class="col l4">
        <label style="font-size:15px;">Foto actual</label>
        <img class="col l12" id="desplegar" src="{{asset("user.png")}}" alt="">
      </div>
  </div>

  <form id="formulario" class="" action="{{route("users.store")}}" method="post">
      {!!csrf_field()!!}
      <div class="row">


          <div class="input-field col s12 l6">
            <input id="nombres" name="nombres" type="text" value="{{old("nombres")}}">
            <label for="nombres">Nombres</label>
            {!! $errors->first("nombres", "<span class='red-text'>:message</span>")!!}
          </div>

          <div class="input-field col s12 l6">
            <input id="apellidos" name="apellidos" type="text" value="{{old("apellidos")}}">
            <label for="apellidos">Apellidos</label>
            {!! $errors->first("apellidos", "<span class='red-text'>:message</span>")!!}
          </div>

          <div class="input-field col s12 l6">
            <input id="matricula" name="matricula" type="tel" value="{{old("matricula")}}">
            <label for="matricula">Matrícula</label>
            {!! $errors->first("matricula", "<span class='red-text'>:message</span>")!!}
          </div>


          <div class="input-field col s12 l6">
            <select class="" id="carrera" name="carrera">
              <option value="" disabled selected>Selecciona carrera</option>
              <option value="Ing. en Gestión Empresarial" {{ old("carrera") == "Ing. en Gestión Empresarial" ? "selected" : "" }}>Ing. en Gestión Empresarial</option>
              <option value="Ing. Ambiental" {{ old("carrera") == "Ing. Ambiental" ? "selected" : "" }}>Ing. Ambiental</option>
              <option value="Ing. Bioquímica" {{ old("carrera") == "Ing. Bioquímica" ? "selected" : "" }}>Ing. Bioquímica</option>
              <option value="Ing. Biomédica" {{ old("carrera") == "Ing. Biomédica" ? "selected" : "" }}>Ing. Biomédica</option>
              <option value="Ing. Química" {{ old("carrera") == "Ing. Química" ? "selected" : "" }}>Ing. Química</option>
              <option value="Ing. Eléctrica" {{ old("carrera") == "Ing. Eléctrica" ? "selected" : "" }}>Ing. Eléctrica</option>
              <option value="Ing. Electrónica" {{ old("carrera") == "Ing. Electrónica" ? "selected" : "" }}>Ing. Electrónica</option>
              <option value="Ing. Mecánica" {{ old("carrera") == "Ing. Mecánica" ? "selected" : "" }}>Ing. Mecánica</option>
              <option value="Ing. Civil" {{ old("carrera") == "Ing. Civil" ? "selected" : "" }}>Ing. Civil</option>
              <option value="Ing. Industrial" {{ old("carrera") == "Ing. Industrial" ? "selected" : "" }}>Ing. Industrial</option>
              <option value="Ing. en Sistemas Computacionales" {{old("carrera")  == "Ing. en Sistemas Computacionales" ? "selected" : "" }}>Ing. en Sistemas Computacionales</option>
              <option value="Lic. en Administración" {{old("carrera") == "Lic. en Administración" ? "selected" : "" }}>Lic. en Administracion</option>
            </select>
            {!! $errors->first("carrera", "<span class='red-text'>:message</span>")!!}
            <label>Carrera</label>
          </div>

          <div class="input-field col s12 l6">
            <input id="email" name="email" type="tel" value="{{old("email")}}">
            <label for="email">Email</label>
            <span class='red-text'></span>
            {!! $errors->first("email", "<span class='red-text'>:message</span>")!!}

          </div>

          <div class="input-field col s12 l6">
            <input id="telefono" name="telefono" type="tel" value="{{old("telefono")}}">
            <label for="telefono">Teléfono</label>
            {!! $errors->first("telefono", "<span class='red-text'>:message</span>")!!}

          </div>

          <div class="input-field col s12 l6">
            <select class="" id="rol" name="rol">
                <option value="" disabled selected>Selecciona Rol</option>
                <option value="Servicio Social" {{old("rol") == "Servicio Social" ? "selected" : "" }}>Servicio Social</option>
                <option value="Residencia" {{old("rol") == "Residencia" ? "selected" : "" }}>Residencia</option>
                <option value="Maestro" {{old("rol") == "Maestro" ? "selected" : "" }}>Maestro</option>
                <option value="Celulas de Innovación" {{old("rol") == "Celulas de Innovación" ? "selected" : "" }}>Celulas de Innovación</option>
                <option value="Celulas de Innovación - Coach" {{old("rol") == "Celulas de Innovación - Coach" ? "selected" : "" }}>Celulas de Innovación - Coach</option>
                <option value="Incubadora de innovación" {{old("rol") == "Incubadora de innovación" ? "selected" : "" }}>Incubadora de innovación</option>
                <option value="Alumnos Doctor Chan" {{old("rol") == "Alumnos Doctor Chan" ? "selected" : "" }}>Alumnos Doctor Chan</option>
            </select>
            {!! $errors->first("rol", "<span class='red-text'>:message</span>")!!}

          </div>

          <div class="input-field col s12 l6">
            <p>
              <label>
                <input type="radio" id="administrador" name="tipoDeUsuario" value="administrador" {{strtolower(old("tipoDeUsuario")) == "administrador" ? "checked" : "" }}>
                <span>Administrador</span>
              </label>

              <label>
                <input type="radio" id="asistente" name="tipoDeUsuario" value="asistente" {{strtolower(old("tipoDeUsuario")) == "asistente" ? "checked" : "" }}>
                <span>Asistente</span>
              </label>

              <label>
                <input type="radio" id="usuario" name="tipoDeUsuario" value="usuario" {{strtolower(old("tipoDeUsuario")) == "usuario" ? "checked" : "" }}>
                <span>Usuario</span>
              </label>
            </p>
            {!! $errors->first("tipoDeUsuario", "<span class='red-text'>:message</span>")!!}
          </div>

          <div class="input-field col s12 l6">
            <input hidden   id="foto" name="foto" type="text" value="">
            {!! $errors->first("foto", "<span class='red-text'>:message</span>")!!}
          </div>

      </div>

      <button class="btn" type="submit" name="store">
        Registrar
        <i class="material-icons right">save</i>
      </button>
      <div class="row">
      </div>
  </form>
@endsection

@section("scripts")
  @extends('scripts/p5')
  <script src="{{asset('/js/webcam.js')}}" type="text/javascript"></script>
  <script src="{{asset('/js/password.js')}}" type="text/javascript"></script>
  <script src="{{asset('/js/ajaxForModal/storeUserModal.js')}}"></script>

@endsection
