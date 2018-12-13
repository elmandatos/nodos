
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

