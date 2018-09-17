@extends('layout')
@section('contenido')
    <h1>INTRODUZCA QR PARA INGRESAR</h1>
    <?php // TODO: Utilizar ajax una vez leido el id del qr para buscar el usuario en la bd
    //y ver si informacion en el apartado edit.blade ?>
    <form action="" method="post">
        <input type="text" name="id" placeholder="ID del usuario">
    </form>

    <div>
          <video id="preview"></video>
    </div>

    <script src="/js/camera.js"></script>

  
    
@stop
