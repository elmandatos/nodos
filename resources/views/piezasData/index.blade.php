@extends('layout')
@section('contenido')
    <br><br>
    <form method="post" action="{{route("piezasData.import")}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="file" name="excel">
        <br><br>
        <button class="btn" type="submit">Enviar</button>
    </form>
@stop
