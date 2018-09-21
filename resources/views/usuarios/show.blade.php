@extends("layout")
@section("contenido")

    <th>{{$user->foto}}</th>
    <table width="100%" border="1">
        <tr>
            <th>Nombres:</th>
            <td>{{$user->nombres}}</td>
            <th>Apellidos:</th>
            <td>{{$user->apellidos}}</td>
        </tr>
        <tr>
            <th>Teléfono:</th>
            <td>{{$user->telefono}}</td>
            <th>Email:</th>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <th>Rol:</th>
            <td>{{$user->rol}}</td>
            <th>Tipo de usuario:</th>
            <td>{{$user->tipo_de_usuario}}</td>
        </tr>
        <tr>
            <td>
                <form class="" action="{{route("get_in",$user->id)}}" method="post">
                    {!!csrf_field()!!}
                    <input type="submit" name="" value="Entrada">
                </form>
            </td>
            <td>
                <form class="" action="{{route("get_out",$user->id)}}" method="post">
                    {!!csrf_field()!!}
                    <input type="submit" name="" value="Salir">
                </form>
            </td>
        </tr>
    </table>


@stop
