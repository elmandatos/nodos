@extends('layout')
@section('contenido')
    <h1>Escanea el código QR</h1>
    <?php // TODO: Utilizar ajax una vez leido el id del qr para buscar el usuario en la bd
    //y ver si informacion en el apartado edit.blade ?>
    <form action="{{route("users.search")}}" method="post">
        {!!csrf_field()!!}

        <input type="text" name="search" placeholder="ID del usuario">
    </form>

    <div>
          <video id="preview"></video>
    </div>
@endsection

@section("scripts")
  <script src="{{asset('/js/camera.js')}}" type="text/javascript"></script>
@endsection
