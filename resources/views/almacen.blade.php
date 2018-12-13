<<<<<<< HEAD
@extends('layout')
@section('contenido')
	<h1>Inventaio, Saludos <?php echo $nombre; ?></h1>
	<form action="">
		{{-- materialize sirvio aqui para el foramto usando los extends y section --}}
		<label for="">Buscar </label>
		<input type="text">

		<label for="">Nombre:</label>
		<input type="text" id="txtNombre">
		<br>

		<label for="">Modelo:</label>
		<input type="text" id="txtModelo">
		<br>

		<label for="">Cantidad:</label>
		<input type="text" id="txtCantidad">
		<br>

		<label for="">Descripcion:</label>
		<input type="text" id="txtDescripcion">
		<br>

		<label for="">Anaquel:</label>
		<input type="text" id="txt Anaquel">
		<button class="btn"> Enviar</button>

	</form>
	@endsection
=======

@extends('layout')

@section('contenido')
	<h1>Inventario,<?php echo $nombre;  ?></h1>
	<form>
		<!-- Se agregan las Label para consultas, heredando lo que se ha echo en el MATERIALIZE -->
		<label>NOMBRE </label><br />
		<input type="text" name="nombre"> <br />
		<label></label>
		<label>MODELO</label><br />
		<input type="text" name="modelo"> <br />
		<label></label>
		<label>CANTIDAD</label><br />
		<input type="text" name="cantidad"> <br />
		<label></label>
		<label>DESCRIPCION</label><br />
		<input type="text" name="descripcion"> <br />
		<label></label>
		<label>ANAQUEL</label><br />
		<input type="text" name="anaquel"> <br />
		<label></label>
		<button class='btn'>ENVIAR</button>
	</form>
@endsection
>>>>>>> Almacen
