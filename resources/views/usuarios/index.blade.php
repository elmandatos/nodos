@extends('layout')
@section('contenido')

<div class="row">
    <form class="" action="index.html" method="post">
        <div class="input-field col s12">
          <input class="col s12 l6" type="text" name="searchUser" id="searchUser" value="">
          <label for="last_name">Buscar</label>
        </div>
    </form>
</div>

<div class="row">
  <a class="btn s12 l2" href="{{route("users.create")}}">Nuevo Usuario</a>
  <a class="btn s12 l2" href="{{route("usersData.index")}}">Importar Usuarios</a>
  <a class="btn s12 l2" href="{{route("usersData.export")}}">Exportar Datos</a>
</div>



@foreach ($users as $user)
  <div class="card z-depth-1">
    <div class="row">
      <div class="card-image">
        <img style="padding:0;" class="col s12 l5" src="{{$user->foto}}">
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

          {{-- ACCESO --}}
          <div class="col s12 l6">
            <a href="{{route("users.edit",$user->id)}}">Editar</a>
            <form class="" action="{{route("users.destroy",$user->id)}}" method="post">
                {{method_field("DELETE")}}
                {!!csrf_field()!!}
                <input type="submit" name="" value="Eliminar">
            </form>
            <a href="{{route("sendEmail",$user->id)}}">QR code</a>
          </div>

          {{-- ACCIONES --}}
          <div class="col s12 l6">
            <form class="" action="{{route("get_in",$user->id)}}" method="post">
                {!!csrf_field()!!}
                <input type="submit" name="" value="Entrada">
            </form>
            <form class="" action="{{route("get_out",$user->id)}}" method="post">
                {!!csrf_field()!!}
                <input type="submit" name="" value="Salir">
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endforeach
{{-- <table width="100%" border="1">

    <thead>
        <tr>
            <th>Foto</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Carrera</th>
            <th>Matrícula</th>
            <th>Rol</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Tipo de Usuario</th>
            <th>Registro</th>
            <th>Administrar</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td><img src="{{$user->foto}}" alt=""></td>
            <td>{{$user->nombres}}</td>
            <td>{{$user->apellidos}}</td>
            <td>{{$user->carrera}}</td>
            <td>{{$user->matricula}}</td>
            <td>{{$user->rol}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->telefono}}</td>
            <td>{{$user->tipo_de_usuario}}</td>
            <td>
                <form class="" action="{{route("get_in",$user->id)}}" method="post">
                    {!!csrf_field()!!}
                    <input type="submit" name="" value="Entrada">
                </form><br>
                <form class="" action="{{route("get_out",$user->id)}}" method="post">
                    {!!csrf_field()!!}
                    <input type="submit" name="" value="Salir">
                </form>
            </td>
            <td>
                <a href="{{route("users.edit",$user->id)}}">Editar</a>
                <form class="" action="{{route("users.destroy",$user->id)}}" method="post">
                    {{method_field("DELETE")}}
                    {!!csrf_field()!!}
                    <input type="submit" name="" value="Eliminar">
                </form>
                <a href="{{route("sendEmail",$user->id)}}">QR code</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> --}}
<a href="{{route("sendEmails")}}">correos</a>
@stop
