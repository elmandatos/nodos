@extends('layout')
@section('contenido')
  <div class="row"></div>
<div class="row">
    <form class="" action="index.html" method="post">
        <div class="input-field col s12">
          <input class="col s12 l6" type="text" name="searchUser" id="searchUser" value="">
          <label for="last_name">Buscar</label>
        </div>
    </form>
</div>


<div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">more_vert</i>
  </a>
  <ul>
    <li><a href="{{route("sendEmails")}}" class="btn-floating red tooltipped"  data-position="left" data-tooltip="Eviar QR a todos los usuarios"><i class="material-icons">email</i></a></li>
    <li><a href="{{route("usersData.index")}}" class="btn-floating green tooltipped" data-position="left" data-tooltip="Importar usuarios"><i class="material-icons">cloud_upload</i></a></li>
    <li><a href="{{route("usersData.export")}}" class="btn-floating blue tooltipped" data-position="left" data-tooltip="Exportar usuarios"><i class="material-icons">cloud_download</i></a></li>
    <li><a href="{{route("users.create")}}" class="btn-floating tooltipped" data-position="left" data-tooltip="Nuevos usuario"><i class="material-icons">add</i></a></li>
  </ul>
</div>

@foreach ($users as $user)

  <div class="card z-depth-2">
    <div style="position: absolute;width: 100%;, left:0px;,top:0px; z-index: 4;" class="row">
      <div class="col s12 m12 l12">
        <div class="row">

          <form class="" action="{{route("users.destroy",$user->id)}}" method="post">
              {{method_field("DELETE")}}
              {!!csrf_field()!!}
              <button class="btn col s3 m1 l1 offset-s9 offset-m11 offset-l11 red" type="submit" name="">
                <i class="material-icons">delete</i>
              </button>
          </form>

        </div>
      </div>
    </div>

    <div class="row">
      <div style="padding:0;" class="card-image col s12 l5">
        <img style="padding:0;" class="" src="{{$user->foto}}">

        <a class="btn-floating left halfway-fab waves-effect waves-light" href="{{route("users.edit",$user->id)}}">
          <i class="material-icons">edit</i>
        </a>

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
          <!-- Dropdown Trigger ACCESO -->
          <div class="col s12 l6">
            <a class="dropdown-trigger  btn" data-target="dropdown1"><i class="material-icons right">arrow_drop_down_circle</i>Acceso</a>
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
              <li><a href="{{route("get_in",$user->id)}}">Entrada</a></li>
              <li><a href="{{route("get_out",$user->id)}}">Salida</a></li>
            </ul>
          </div>

          <div class="col s12 l6">
            <a class="btn" href="{{route("users.generateQr",$user->id)}}">Generar QR<i class="material-icons right">developer_board</i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row"></div>
@endforeach

@stop
