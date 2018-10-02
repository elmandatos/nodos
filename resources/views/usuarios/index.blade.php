@extends('layout')
@section('contenido')

    <table width="100%" border="1">
        <form class="" action="index.html" method="post">
            <input type="text" name="searchUser" placeholder="Buscar" value="">
            <input type="submit" name="" value="Buscar">
        </form>
        <div class="">
            <a href="{{route("users.create")}}">Nuevo Usuario</a>
        </div>
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
                        <a href="{{route("users.generateQr",$user->id)}}">QR code</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route("sendEmails")}}">correos</a> 
@stop
