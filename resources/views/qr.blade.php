@extends('layout')
@section('contenido')
<div class="camara">
    <br><br>
    <p>Escanea el código QR</p>
    <br><br>
    <div id="content">
          <video id="preview"></video>
          {{-- <img id="mano_telefono" src="{{asset('telefono5.png')}}"> --}}
    </div>
</div>
@endsection

@section("scripts")
  <script src="{{asset('/js/camera.js')}}" type="text/javascript"></script>
@endsection
