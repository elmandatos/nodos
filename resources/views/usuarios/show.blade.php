@extends("layout")
@section("contenido")

  <br><br><br>
  <div class="card z-depth-2">
  <div class="row">
    <div style="padding:0;" class="card-image col s12 l5">
      <img style="padding:0;" class="" src="{{$user->foto}}">
    </div>
    {{-- DATOS DE USUARIO--}}
    <div  class="col l7">
      <div class="row">
        {{-- NOMBRES --}}
        <div class="col s12 l6">
          <h6 style="font-weight: bold;">Nombres:</h6>
          <i>{{$user->nombres}}</i>
        </div>

        {{-- APELLIDOS --}}
        <div class="col s12 l6">
          <h6 style="font-weight: bold;">Apellidos:</h6>
          <i>{{$user->apellidos}}</i>
        </div>

        {{-- CARRERA --}}
        <div class="col s12 l6">
          <h6 style="font-weight: bold;">Carrera:</h6>
          <i>{{$user->carrera}}</i>
        </div>

        {{-- MATRICULA --}}
        <div class="col s12 l6">
          <h6 style="font-weight: bold;">Matrícula:</h6>
          <i>{{$user->matricula}}</i>
        </div>

        {{-- ROL --}}
        <div class="col s12 l6">
          <h6 style="font-weight: bold;">Rol:</h6>
          <i>{{$user->rol}}</i>
        </div>

        {{-- TIPO DE USUARIO --}}
        <div class="col s12 l6">
          <h6 style="font-weight: bold;">Tipo de usuario:</h6>
          <i>{{$user->tipo_de_usuario}}</i>
        </div>

        {{-- EMAIL --}}
        <div class="col s12 l6">
          <h6 style="font-weight: bold;">Email:</h6>
          <i>{{$user->email}}</i>
        </div>

        {{-- TELEFONO --}}
        <div class="col s12 l6">
          <h6 style="font-weight: bold;">Télefono:</h6>
          <i>{{$user->telefono}}</i>
        </div>

        <div class="col s12 l6">
          <a class="btn" href="{{route("get_in",$user->id)}}">Entrada</a>
        </div>

        <div class="col s12 l6">
          <a class="btn" href="{{route("get_out",$user->id)}}">Salida</a>
        </div>
      </div>
    </div>
  </div>
  </div>

@stop
