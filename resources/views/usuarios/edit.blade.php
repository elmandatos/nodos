@extends('layout')

@section('contenido')

{{-- <video width="0" height="0"></video> --}}
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
      <img class="col l12" id="desplegar" src="{{$user->foto}}" alt="">
    </div>
</div>

<form class="" id="updateUser" action="{{route("users.update", $user->id)}}" method="post">
    {{method_field("PUT")}}
    {!!csrf_field()!!}
    <div class="row">


        <div class="input-field col s12 l6">
          <input id="nombres" name="nombres" type="text" value="{{$user->nombres}}">
          <label for="nombres">Nombres</label>
          <span class='red-text' id="nombres-span"></span>
          {!! $errors->first("nombres", "<span class='red-text'>:message</span>")!!}

        </div>

        <div class="input-field col s12 l6">
          <input id="apellidos" name="apellidos" type="text" value="{{$user->apellidos}}">
          <label for="apellidos">Apellidos</label>
          <span class='red-text' id="apellidos-span"></span>
          {!! $errors->first("apellidos", "<span class='red-text'>:message</span>")!!}
        </div>

        <div class="input-field col s12 l6">
          <input id="matricula" name="matricula" type="tel" value="{{$user->matricula}}">
          <label for="matricula">Matrícula</label>
          <span class='red-text' id="matricula-span"></span>
          {!! $errors->first("matricula", "<span class='red-text'>:message</span>")!!}
        </div>


        <div class="input-field col s12 l6">
          <select class="" id="carrera" name="carrera">
            <option value="" disabled selected>Selecciona carrera</option>
            <option value="Ing. en Gestión Empresarial" {{ $user->carrera == "Ing. en Gestión Empresarial" ? "selected" : "" }}>Ing. en Gestión Empresarial</option>
            <option value="Ing. Ambiental" {{ $user->carrera == "Ing. Ambiental" ? "selected" : "" }}>Ing. Ambiental</option>
            <option value="Ing. Bioquímica" {{ $user->carrera == "Ing. Bioquímica" ? "selected" : "" }}>Ing. Bioquímica</option>
            <option value="Ing. Biomédica" {{ $user->carrera == "Ing. Biomédica" ? "selected" : "" }}>Ing. Biomédica</option>
            <option value="Ing. Química" {{ $user->carrera == "Ing. Química" ? "selected" : "" }}>Ing. Química</option>
            <option value="Ing. Eléctrica" {{ $user->carrera == "Ing. Eléctrica" ? "selected" : "" }}>Ing. Eléctrica</option>
            <option value="Ing. Electrónica" {{ $user->carrera == "Ing. Electrónica" ? "selected" : "" }}>Ing. Electrónica</option>
            <option value="Ing. Mecánica" {{ $user->carrera == "Ing. Mecánica" ? "selected" : "" }}>Ing. Mecánica</option>
            <option value="Ing. Civil" {{ $user->carrera == "Ing. Civil" ? "selected" : "" }}>Ing. Civil</option>
            <option value="Ing. Industrial" {{ $user->carrera == "Ing. Industrial" ? "selected" : "" }}>Ing. Industrial</option>
            <option value="Ing. en Sistemas Computacionales" {{$user->carrera  == "Ing. en Sistemas Computacionales" ? "selected" : "" }}>Ing. en Sistemas Computacionales</option>
            <option value="Lic. en Administración" {{ $user->carrera == "Lic. en Administración" ? "selected" : "" }}>Lic. en Administracion</option>
            <option value="Otra" {{ $user->carrera == "Otra" ? "selected" : "" }}>Otra</option>
          </select>
          <label>Carrera</label>
          <span class='red-text' id="carrera-span"></span>
          {!! $errors->first("carrera", "<span class='red-text'>:message</span>")!!}
        </div>

        <div class="input-field col s12 l6">
          <input id="email" name="email" type="tel" value="{{$user->email}}">
          <label for="email">Email</label>
          <span class='red-text' id="email-span"></span>
          {!! $errors->first("email", "<span class='red-text'>:message</span>")!!}
        </div>

        <div class="input-field col s12 l6">
          <input id="telefono" name="telefono" type="tel" value="{{$user->telefono}}">
          <label for="telefono">Teléfono</label>
          <span class='red-text' id="telefono-span"></span>
          {!! $errors->first("telefono", "<span class='red-text'>:message</span>")!!}
        </div>

        <div class="input-field col s12 l6">
          <select class="" id="rol" name="rol">
              <option value="" disabled selected>Selecciona Rol</option>
              <option value="Servicio Social" {{$user->rol == "Servicio Social" ? "selected" : "" }}>Servicio Social</option>
              <option value="Residencia" {{$user->rol == "Residencia" ? "selected" : "" }}>Residencia</option>
              <option value="Maestro" {{$user->rol == "Maestro" ? "selected" : "" }}>Maestro</option>
              <option value="Células de Innovación" {{$user->rol == "Células de Innovación" ? "selected" : "" }}>Células de Innovación</option>
              <option value="Células de Innovación - Coach" {{$user->rol == "Células de Innovación - Coach" ? "selected" : "" }}>Celulas de Innovación - Coach</option>
              <option value="Incubadora de innovación" {{$user->rol == "Incubadora de innovación" ? "selected" : "" }}>Incubadora de innovación</option>
              <option value="Alumnos Doctor Chan" {{$user->rol == "Alumnos Doctor Chan" ? "selected" : "" }}>Alumnos Doctor Chan</option>
              <option value="Club de Robótica" {{$user->rol == "Club de Robótica" ? "selected" : "" }}>Club de Robótica</option>
              <option value="Proyecto Externo" {{$user->rol == "Proyecto Externo" ? "selected" : "" }}>Proyecto Externo</option>

          </select>
          <span class='red-text' id="rol-span"></span>
          {!! $errors->first("rol", "<span class='red-text'>:message</span>")!!}
        </div>

        <div class="input-field col s12 l6">
          <p>
            @if(auth()->user()->tipo_de_usuario == "Administrador")
              <label>
                <input type="radio" id="administrador" name="tipoDeUsuario" value="administrador" {{strtolower($user->tipo_de_usuario) == "administrador" ? "checked" : "" }}>
                <span>Administrador</span>
              </label>
              <label>
                <input type="radio" id="asistente" name="tipoDeUsuario" value="asistente" {{strtolower($user->tipo_de_usuario) == "asistente" ? "checked" : "" }}>
                <span>Asistente</span>
              </label>
            @endif
              <label>
                <input type="radio" id="usuario" name="tipoDeUsuario" value="usuario" {{strtolower($user->tipo_de_usuario) == "usuario" ? "checked" : "" }}>
                <span>Usuario</span>
              </label>
           

          </p>
          <span class='red-text' id="tipoDeUsuario-span"></span>
          {!! $errors->first("tipoDeUsuario", "<span class='red-text'>:message</span>")!!}
        </div>

        <div class="input-field col s12 l6">
          <input hidden id="foto" name="foto" type="text" value="{{$user->foto}}">
        </div>

    </div>

    <button class="btn" type="submit" name="update">
      Actualizar
      <i class="material-icons right">save</i>
    </button>
    <div class="row">
    </div>

</form>
@endsection

@section("scripts")
  @extends('scripts/p5')
  <script src="{{asset('/js/webcam.js')}}" type="text/javascript"></script>
  <script src="{{asset('/js/ajaxForModal/updateUserModal.js')}}"></script>
@endsection
