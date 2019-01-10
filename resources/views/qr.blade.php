@extends('layout')
@section('contenido')
<div class="camara">
    <p style="margin-bottom: 75px;">Escanea el código QR</p>
    <div id="content">
          <video id="preview"></video>
          <img id="mano_telefono" src="{{asset('telefono5.png')}}">
    </div>
</div>
@endsection

@section("scripts")
  <script src="{{asset('/js/camera.js')}}" type="text/javascript"></script>
@endsection
