@extends("layout")
@section("contenido")
    <h1>Restaurar Contraseña</h1>
    <form class="" action="{{route("showResetForm")}}" method="post">
        {{ csrf_field() }}
        <input type="email" name="email" placeholder="Correo">
        <input type="password" name="password" placeholder="Contraseña">
        <input type="submit" class="btn" value="Entrar">
    </form>
@stop
