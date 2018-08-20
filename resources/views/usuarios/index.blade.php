@extends('layout')
@section('contenido')

    <table width="100%" border="1">
        <div class="">
            <input type="text" name="searchUser" placeholder="Buscar" value="">
        </div>
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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->foto}}</td>
                    <td>{{$user->nombres}}</td>
                    <td>{{$user->apellidos}}</td>
                    <td>{{$user->carrera}}</td>
                    <td>{{$user->matricula}}</td>
                    <td>{{$user->rol}}</td>
                    <td>{{$user->correo}}</td>
                    <td>{{$user->telefono}}</td>
                    <td>{{$user->tipo_de_usuario}}</td>
                    <td>
                        <a href="{{route("users.edit",$user->id)}}">Editar</a>
                        <form class="" action="{{route("users.destroy",$user->id)}}" method="post">
                            {{method_field("DELETE")}}
                            {!!csrf_field()!!}
                            <input type="submit" name="" value="Eliminar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
