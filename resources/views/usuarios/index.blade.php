@extends('layout')
@section('contenido')
  <div class="row"></div>
<div class="row">
    <form action="{{route("users.search")}}" method="get">
        {!!csrf_field()!!}
        <div class="input-field col s12 l6">
          <input class="col s12 l12" type="text" name="search" id="searchUser" value="">
          <label for="last_name">Buscar</label>
        </div>
    </form>
</div>

{{-- mensaje perzonalizado de usuario no encontrado --}}
@if (isset($imgNotFound) && $imgNotFound)
  <div class="row">
    <div class="col l4 offset-l4">
      <h4 class="center-align">USUARIO NO ENCONTRADO</h4>
      <img class="col l12" style="padding:0;" class="" src="{{asset('/user_not_found.png')}}">
    </div>
  </div>
@endif

@if(auth()->user()->tipo_de_usuario == "Administrador")
<div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">more_vert</i>
  </a>
  <ul>
      <li><a onclick="dialogSendQRUsers();" class="btn-floating red"  data-tippy-placement="left" data-tippy="Eviar QR a todos los usuarios"><i class="material-icons">email</i></a></li>
      <li><a href="{{route("showResetForm")}}" class="btn-floating pink" data-tippy-placement="left" data-tippy="¿Olvidó su contraseña?"><i class="material-icons">fingerprint</i></a></li>
      <li><a href="{{route("usersData.index")}}" class="btn-floating green" data-tippy-placement="left" data-tippy="Importar usuarios"><i class="material-icons">cloud_upload</i></a></li>
      <li><a href="{{route("usersData.export")}}" class="btn-floating blue" data-tippy-placement="left" data-tippy="Exportar usuarios"><i class="material-icons">cloud_download</i></a></li>
      <li><a href="{{route("usersCelulasData.export")}}" class="btn-floating lime amber" data-tippy-placement="left" data-tippy="Exportar usuarios de Células"><i class="material-icons">grain</i></a></li>
      <li><a href="{{route("users.create")}}" class="btn-floating" data-tippy-placement="left" data-tippy="Nuevos usuario"><i class="material-icons">add</i></a></li>
  </ul>
</div>
@endif

@php
$cardNumber = 0;
@endphp
@foreach ($users as $user)
  @php
  $cardNumber += 1;
  $dropDownNumber = "dropDown".$cardNumber;
  $cardName = "cardNumber".$cardNumber;;
  @endphp
  <div class="userCard">

    <div class="card z-depth-2" name="{{$cardName}}" id="{{$cardName}}">
      <div style="position: absolute;width: 100%;, left:0px;,top:0px; z-index: 4;" class="row">
        <div class="col s12 m12 l12">
        @if(auth()->user()->tipo_de_usuario == "Administrador")
          <div class="row">
            {{--Boton delete user--}}
            {{method_field("DELETE")}}
            {!!csrf_field()!!}
          <!-- Modal Trigger -->
              <a onclick="dialogDeleteConfirm({{$user->id}}, '{{csrf_token()}}', '{{$cardName}}');"  class="btn col s3 m1 l1 offset-s9 offset-m11 offset-l11 red ">
                <i class="material-icons">delete</i>
              </a>
        </div>
        @endif
      </div>
    </div>
    <div class="row">
      {{-- IMAGEN --}}
      <div style="padding:0;" class="card-image user col s12 m12 l6">
        {{-- <div style="height:9%;display: inline-block;">
        </div> --}}
        <img style="padding:0;" class="col l12" src="{{$user->foto}}">
        <a class="btn-floating left halfway-fab waves-effect waves-light" href="{{route("users.edit",$user->id)}}">
          <i class="material-icons">edit</i>
        </a>
      </div>
      {{-- DATOS DE USUARIO--}}
      <div  class="col userInfo l6">
        <div class="row" style="margin-bottom:10px">
          {{-- NOMBRES --}}
          <div class="col s6 m6 l6">
            <h6 style="font-weight: bold;">Nombres:</h6>
            <i>{{$user->nombres}}</i>
          </div>

          {{-- APELLIDOS --}}
          <div class="col s6 m6 l6">
            <h6 style="font-weight: bold;">Apellidos:</h6>
            <i>{{$user->apellidos}}</i>
          </div>

          {{-- CARRERA --}}
          <div class="col s6 m6 l6">
            <h6 style="font-weight: bold;">Carrera:</h6>
            <i>{{$user->carrera}}</i>
          </div>

          {{-- MATRICULA --}}
          <div class="col s6 m6 l6">
            <h6 style="font-weight: bold;">Matrícula:</h6>
            <i>{{$user->matricula}}</i>
          </div>

          {{-- ROL --}}
          <div class="col s6 m6 l6">
            <h6 style="font-weight: bold;">Rol:</h6>
            <i>{{$user->rol}}</i>
          </div>

          {{-- TIPO DE USUARIO --}}
          <div class="col s6 m6 l6">
            <h6 style="font-weight: bold;">Tipo de usuario:</h6>
            <i>{{$user->tipo_de_usuario}}</i>
          </div>

          {{-- EMAIL --}}
          <div class="col s6 m6 l6">
            <h6 style="font-weight: bold;">Email:</h6>
            <i>{{$user->email}}</i>
          </div>

          {{-- TELEFONO --}}
          <div class="col s12 m6 l12">
            <h6 style="font-weight: bold;">Télefono:</h6>
            <i>{{$user->telefono}}</i>
          </div>
          <!-- Dropdown Trigger ACCESO -->
          <div class="col s12 m6 l6">
            <a class="dropdown-trigger btn" data-target="{{$dropDownNumber}}"><i class="material-icons right">arrow_drop_down_circle</i>Acceso</a>
            <!-- Dropdown Structure -->
            <ul id='{{$dropDownNumber}}' class='dropdown-content'>
              <li><a href="{{route("get_in",$user->id)}}" class="entrada">Entrada</a></li>
              <li><a href="{{route("get_out",$user->id)}}" class="salida">Salida</a></li>
            </ul>
          </div>
          @if(auth()->user()->tipo_de_usuario == "Administrador")
          <div class="col s12 l6">
            <a class="btn" href="{{route("users.generateQr",$user->id)}}">QR<i class="material-icons right">developer_board</i></a>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="row"></div>
@endforeach
{{-- <div class="center">
  {{ $users->links() }}
</div> --}}
@endsection



@section("scripts")
  @extends("scripts/p5")
  <script type="text/javascript" src="{{asset('/js/ajaxForModal/deleteUserModal.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/ajaxForModal/dialogSendQRUsers.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/ajaxForModal/getIn_getOut.js')}}"></script>
  </script>
@endsection
