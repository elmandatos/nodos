@extends('layout')
@section('contenido')
<div class="camara">
    <br><br>
    <p>Escanea el código QR</p>
    <div id="content">

          <video id="preview"></video>
          <img id="telefono" src="{{asset('telefono2.png')}}">
    </div>
</div>
@endsection

@section("scripts")
  <script src="{{asset('/js/camera.js')}}" type="text/javascript"></script>
@endsection
