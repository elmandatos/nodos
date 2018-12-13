
@extends('layout')
@section('contenido')
	<h1>Inventaio, Saludos </h1>
	<form method="POST" action="almacenado">
		{{-- materialize sirvio aqui para el foramto usando los extends y section --}}
		<label for="buscar">Buscar </label>
		<input type="text">

		<label for="">Nombre:</label>
		<input type="text" id="txtNombre" name="nombre">
		<br>

		<label for="">Modelo:</label>
		<input type="text" id="txtModelo" name="modelo">
		<br>

		<label for="">Cantidad:</label>
		<input type="text" id="txtCantidad" name="cantidad">
		<br>

		<label for="">Descripcion:</label>
		<input type="text" id="txtDescripcion" name="descripcion">
		<br>

		<label for="">Anaquel:</label>
		<input type="text" id="txt Anaquel" name="anaquel">
		{{-- <button class="btn"> Enviar</button> --}}
		<input type="submit" value="Enviar">

	</form>
	@endsection

