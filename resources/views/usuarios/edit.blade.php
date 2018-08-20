@extends('layout')
@section('contenido')
    @if( session()->has("info"))
        <div class="notificacion">
            <h4>{{session("info")}}</h4>
        </div>
    @else
        <form class="" action="{{route("users.update", $user->id)}}" method="post">
            {{method_field("PUT")}}
            {!!csrf_field()!!}
            <table>
                <tr>
                    <td>
                        <label for="nombres">Nombres:</label>
                    </td>
                    <td>
                        <input type="text" id="nombres" name="nombres" value="{{$user->nombres}}">
                        {!! $errors->first("nombres", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="apellidos">Apellidos:</label>
                    </td>
                    <td>
                        <input type="text" id="apellidos" name="apellidos" value="{{$user->apellidos}}">
                        {!! $errors->first("apellidos", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="telefono">Telefono:</label>
                    </td>
                    <td>
                        <input type="tel" id="telefono" name="telefono" value="{{$user->telefono}}">
                        {!! $errors->first("telefono", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="correo">Correo:</label>
                    </td>
                    <td>
                        <input type="email" id="correo" name="correo" value="{{$user->correo}}">
                        {!! $errors->first("correo", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="matricula">Matricula:</label>
                    </td>
                    <td>
                        <input type="text" id="matricula" name="matricula" value="{{$user->matricula}}">
                        {!! $errors->first("matricula", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="carrera">Carrera:</label>
                    </td>
                    <td>
                        <select class="" id="carrera" name="carrera">
                            <option value=""></option>

                            <option value="Ing. Bioquimica" {{$user->carrera == "Ing. Bioquimica" ? "selected" : "" }}>Ing. Bioquimica</option>

                            <option value="Ing. Sistemas Computacionales" {{$user->carrera == "Ing. Sistemas Computacionales" ? "selected" : "" }}>Ing. Sistemas Computacionales</option>
                            <option value="Ing. Electronica" {{$user->carrera == "Ing. Electronica" ? "selected" : "" }}>Ing. Electronica</option>
                            <option value="Ing. Bioquimica" {{$user->carrera == "Ing. Bioquimica" ? "selected" : "" }}>Ing. Bioquimica</option>
                        </select>
                        {!! $errors->first("carrera", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="rol">Rol:</label>
                    </td>
                    <td>
                        <select class="" id="rol" name="rol">
                            <option value=""></option>
                            <option value="Servicio Social" {{$user->rol == "Servicio Social" ? "selected" : "" }}>Servicio Social</option>
                            <option value="Residencia" {{$user->rol == "Residencia" ? "selected" : "" }}>Residencia</option>
                            <option value="Maestro" {{$user->rol == "Maestro" ? "selected" : "" }}>Maestro</option>
                            <option value="Celulas de Innovación" {{$user->rol == "Celulas de Innovación" ? "selected" : "" }}>Celulas de Innovación</option>
                            <option value="Celulas de Innovación - Coach" {{$user->rol == "Celulas de Innovación - Coach" ? "selected" : "" }}>Celulas de Innovación - Coach</option>
                            <option value="Incubadora de innovación" {{$user->rol == "Incubadora de innovación" ? "selected" : "" }}>Incubadora de innovación</option>
                            <option value="Alumnos Doctor Chan" {{$user->rol == "Alumnos Doctor Chan" ? "selected" : "" }}>Alumnos Doctor Chan</option>
                        </select>
                        {!! $errors->first("rol", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Tipo:</label>
                    </td>
                    <td>
                        <label for="administrador">Administrador</label>
                        <input type="radio" id="administrador" name="tipoDeUsuario" value="administrador" {{strtolower($user->tipo_de_usuario) == "administrador" ? "checked" : "" }}>

                        <label for="asistente">Asistente</label>
                        <input type="radio" id="asistente" name="tipoDeUsuario" value="asistente" {{strtolower($user->tipo_de_usuario) == "asistente" ? "checked" : "" }}>

                        <label for="usuario">Usuario</label>
                        <input type="radio" id="usuario" name="tipoDeUsuario" value="usuario" {{strtolower($user->tipo_de_usuario) == "usuario" ? "checked" : "" }}>

                        {!! $errors->first("tipoDeUsuario", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="foto">Foto:</label>
                    </td>
                    <td>
                        <input type="file" id="foto" name="foto" value="{{old("foto")}}">
                        {!! $errors->first("foto", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
            </table>
            <input type="submit" name="" value="Actualizar">
        </form>
    @endif
@stop
