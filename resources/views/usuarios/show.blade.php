@extends("layout")
@section("contenido")

    <img src="{{$user->foto}}" alt="">

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

          {{-- ROL --}}
          <div class="col s12 l6">
            <h6 style="font-weight: bold;">Rol:</h6>
            <i>{{$user->rol}}</i>
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

          {{-- ESPACIO VACIO --}}
            <div class="col s12 16"></div>
            <div class="col s12 16"></div>
            <div class="col s12 16"></div>
            <div class="col s12 16"></div>
          <!-- Dropdown Trigger ACCESO -->
          <div class="col s12 l6">
            <a class="dropdown-trigger btn" data-target="dropdown1"><i class="material-icons right">arrow_drop_down_circle</i>Acceso</a>
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
              <li><a href="{{route("get_in",$user->id)}}">Entrada</a></li>
              <li><a href="{{route("get_out",$user->id)}}">Salida</a></li>
            </ul>
          </div>
        </div>
      </div>

@stop
