@extends('layout')
@section('contenido')
    <br><br>
    <form method="post" action="{{route("usersData.importHours")}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" name="excel">
        <br><br>
        <button type="submit">Enviar</button>
    </form>
@stop
