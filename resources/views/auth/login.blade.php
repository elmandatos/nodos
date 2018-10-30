@extends("layout")
@section("contenido")
    <h1>Login</h1>
    <form class="" action="/login" method="post">
        {{ csrf_field() }}
        <input type="email" name="email" placeholder="Correo">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Entrar">
    </form>
    <br>
    <a href="{{route("showResetForm")}}">¿Olvido su contraseña?</a>
@stop
