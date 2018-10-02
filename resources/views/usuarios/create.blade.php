@extends('layout')
@section('contenido')
    @if( session()->has("info"))
        <div class="notificacion">
            <h4>{{session("info")}}</h4>
        </div>
    @else
        <video width="0" height="0"></video>
        <div>
            <div id="canvasParent"></div>
            <img id="desplegar" src="" alt="">
            <button id="capturar">Capturar Foto</button>
        </div>
        
        <form id="formulario" action="{{route("users.store")}}" method="post">
            {!!csrf_field()!!}
            
            <table>
                <tr>
                    <td>
                        <label for="nombres">Nombres:</label>
                    </td>
                    <td>
                        <input type="text" id="nombres" name="nombres" value="{{old("nombres")}}">
                        {!! $errors->first("nombres", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="apellidos">Apellidos:</label>
                    </td>
                    <td>
                        <input type="text" id="apellidos" name="apellidos" value="{{old("apellidos")}}">
                        {!! $errors->first("apellidos", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="telefono">Telefono:</label>
                    </td>
                    <td>
                        <input type="tel" id="telefono" name="telefono" value="{{old("telefono")}}">
                        {!! $errors->first("telefono", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Correo:</label>
                    </td>
                    <td>
                        <input type="email" id="email" name="email" value="{{old("email")}}">
                        {!! $errors->first("email", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="matricula">Matricula:</label>
                    </td>
                    <td>
                        <input type="text" id="matricula" name="matricula" value="{{old("matricula")}}">
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
                            <option value="Ing. en Gestión Empresarial" {{old("carrera") == "Ing. en Gestión Empresarial" ? "selected" : "" }}>Ing. en Gestión Empresarial</option>
                            <option value="Ing. Ambiental" {{old("carrera") == "Ing. Ambiental" ? "selected" : "" }}>Ing. Ambiental</option>
                            <option value="Ing. Bioquímica" {{old("carrera") == "Ing. Bioquímica" ? "selected" : "" }}>Ing. Bioquímica</option>
                            <option value="Ing. Biomédica" {{old("carrera") == "Ing. Biomédica" ? "selected" : "" }}>Ing. Biomédica</option>
                            <option value="Ing. Química" {{old("carrera") == "Ing. Química" ? "selected" : "" }}>Ing. Química</option>
                            <option value="Ing. Eléctrica" {{old("carrera") == "Ing. Eléctrica" ? "selected" : "" }}>Ing. Eléctrica</option>
                            <option value="Ing. Electrónica" {{old("carrera") == "Ing. Electrónica" ? "selected" : "" }}>Ing. Electrónica</option>
                            <option value="Ing. Mecánica" {{old("carrera") == "Ing. Mecánica" ? "selected" : "" }}>Ing. Mecánica</option>
                            <option value="Ing. Civil" {{old("carrera") == "Ing. Civil" ? "selected" : "" }}>Ing. Civil</option>
                            <option value="Ing. Industrial" {{old("carrera") == "Ing. Industrial" ? "selected" : "" }}>Ing. Industrial</option>
                            <option value="Ing. en Sistemas Computacionales" {{old("carrera") == "Ing. en Sistemas Computacionales" ? "selected" : "" }}>Ing. en Sistemas Computacionales</option>
                            <option value="Lic. en Administración" {{old("carrera") == "Lic. en Administración" ? "selected" : "" }}>Lic. en Administracion</option>
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
                            <option value="Servicio Social" {{old("rol") == "Servicio Social" ? "selected" : "" }}>Servicio Social</option>
                            <option value="Residencia" {{old("rol") == "Residencia" ? "selected" : "" }}>Residencia</option>
                            <option value="Maestro" {{old("rol") == "Maestro" ? "selected" : "" }}>Maestro</option>
                            <option value="Celulas de Innovación" {{old("rol") == "Celulas de Innovación" ? "selected" : "" }}>Celulas de Innovación</option>
                            <option value="Celulas de Innovación - Coach" {{old("rol") == "Celulas de Innovación - Coach" ? "selected" : "" }}>Celulas de Innovación - Coach</option>
                            <option value="Incubadora de innovación" {{old("rol") == "Incubadora de innovación" ? "selected" : "" }}>Incubadora de innovación</option>
                            <option value="Alumnos Doctor Chan" {{old("rol") == "Alumnos Doctor Chan" ? "selected" : "" }}>Alumnos Doctor Chan</option>
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
                        <input class="radioTypeUser" type="radio" id="administrador" name="tipoDeUsuario" value="administrador" {{old("tipoDeUsuario") == "administrador" ? "checked" : "" }}>

                        <label for="asistente">Asistente</label>
                        <input class="radioTypeUser" type="radio" id="asistente" name="tipoDeUsuario" value="asistente" {{old("tipoDeUsuario") == "asistente" ? "checked" : "" }}>

                        <label for="usuario">Usuario</label>
                        <input class="radioTypeUser" type="radio" id="usuario" name="tipoDeUsuario" value="usuario" {{old("tipoDeUsuario") == "usuario" ? "checked" : "" }}>

                        {!! $errors->first("tipoDeUsuario", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
                <tr id="parentPass"></tr>
                <tr>
                    <td>
                        <label for="foto">Foto:</label>
                    </td>
                    <td>
                        <input type="text" id="foto" name="foto" value="{{old("foto")}}">
                        {!! $errors->first("foto", "<span class=error>:message</span>")!!}
                    </td>
                </tr>
            </table>
            <input type="submit" name="" value="Registrar">
        </form>
        <script src="/js/webcam.js" type="text/javascript"></script>
    @endif
@stop
