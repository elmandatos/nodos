
@extends('layout')
@section('contenido')
	<h1>Inventario, Añadir nuevo elemento</h1>
	<form method="POST" action="almacenado">
		{{-- materialize sirvio aqui para el foramto usando los extends y section --}}

		<label for="">Nombre:</label>
		<input type="text" id="txtNombre" name="nombre">
		{!! $errors->first("nombre", "<span class='red-text'>:message</span>")!!}
		<br>

		<label for="">Modelo:</label>
		<input type="text" id="txtModelo" name="modelo">
		{!! $errors->first("modelo", "<span class='red-text'>:message</span>")!!}
		<br>

		<label for="">Cantidad:</label>
		<input type="text" id="txtCantidad" name="cantidad">
		{!! $errors->first("cantidad", "<span class='red-text'>:message</span>")!!}
		<br>

		<label for="">Descripcion:</label>
		<input type="text" id="txtDescripcion" name="descripcion">
		{!! $errors->first("descripcion", "<span class='red-text'>:message</span>")!!}
		<br>

		<label for="">Anaquel:</label>
		<input type="text" id="txt Anaquel" name="anaquel">
		{!! $errors->first("anaquel", "<span class='red-text'>:message</span>")!!}
		<br>
		<button class="btn"> Enviar</button>

	</form>
	@endsection

