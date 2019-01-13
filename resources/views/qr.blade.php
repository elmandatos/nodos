@extends('layout')
@section('noContainer')
<div class="container center-align">
	<div class="qr">
	    <p>Escanea el <br><br><b>código QR</b></p>
	    <img src="{{asset("qr.png")}}" alt="">
		<video class="responsive-video" id="preview"></video>
		<img id="mano_telefono" src="{{asset('telefono6.png')}}">
	</div>
</div>
@endsection

@section("scripts")
  <script src="{{asset('/js/camera.js')}}" type="text/javascript"></script>
@endsection
