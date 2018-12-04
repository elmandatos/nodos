@extends("layout")
@section("contenido")
<br><br><br>

<div class="userCard">

  <div class="card z-depth-2">
    <div style="position: absolute;width: 100%;, left:0px;,top:0px; z-index: 4;" class="row">
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
          <a class="dropdown-trigger btn" data-target="dropDown1"><i class="material-icons right">arrow_drop_down_circle</i>Acceso</a>
          <!-- Dropdown Structure -->
          <ul id='dropDown1' class='dropdown-content'>
            @if($statusEntrada == NULL)
            <li><a href="{{route("get_in",$user->id)}}" class="entrada">Entrada</a></li>
            @else
            <li><a href="{{route("get_out",$user->id)}}" class="salida">Salida</a></li>
            @endif
          </ul>
        </div>

        <div class="col s12 l6">
          <span>
            <b>
              <u>Horas totales: {{$tiempoTotal[0]->tiempo }}</u>
            </b>
          </span>

      </div>
    </div>
  </div>
</div>
</div>
<div class="row"></div>


@endsection
@section("scripts")
  <script type="text/javascript" src="{{asset('/js/ajaxForModal/getIn_getOut.js')}}"></script>
@endsection
