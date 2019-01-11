@extends('layout')
@section('noContainer')
<div class="camara">
    <p>Escanea el código QR</p>
    <div id="content">
          <video id="preview"></video>
          <img id="mano_telefono" src="{{asset('telefono5.png')}}">
    </div>
</div>
@endsection

@section("scripts")
  <script src="{{asset('/js/camera.js')}}" type="text/javascript"></script>
@endsection
