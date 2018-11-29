@extends('layout')
@section('contenido')
<div class="camara">
    <p>Escanea el código QR</p>
    <?php // TODO: Utilizar ajax una vez leido el id del qr para buscar el usuario en la bd
    //y ver si informacion en el apartado edit.blade ?>
    <form action="{{route("users.search")}}" method="post">
        {!!csrf_field()!!}

    </form>
    <br>
    <div id="content">
          <video id="preview"></video>
          {{-- <img src="{{asset('descarga.jpg')}}" alt=""> --}}
    </div>
</div>
@endsection

@section("scripts")
  <script src="{{asset('/js/camera.js')}}" type="text/javascript"></script>
@endsection
