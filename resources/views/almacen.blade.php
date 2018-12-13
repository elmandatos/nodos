
@extends('layout')
@section('contenido')
	<h1>Inventario, Añadir nuevo elemento</h1>
	<form method="POST" action="almacenado">
		{{-- materialize sirvio aqui para el foramto usando los extends y section --}}

		<label for="">Nombre:</label>
		<input type="text" id="txtNombre" name="nombre" value="{{old('nombre')}}" autofocus>
		{!! $errors->first("nombre", "<span class='red-text'>:message</span>")!!}
		<br>

		<label for="">Modelo:</label>
		<input type="text" id="txtModelo" name="modelo" value="{{old('modelo')}}" >
		{!! $errors->first("modelo", "<span class='red-text'>:message</span>")!!}
		<br>

		<label for="">Cantidad:</label>
		<input type="number" min="1" id="txtCantidad" name="cantidad" value="{{old('cantidad')}}">
		{!! $errors->first("cantidad", "<span class='red-text'>:message</span>")!!}
		<br>

		<label for="">Descripcion:</label>
		<input type="text" id="txtDescripcion" name="descripcion" value="{{old('descripcion')}}">
		{!! $errors->first("descripcion", "<span class='red-text'>:message</span>")!!}
		<br>

		<label for="">Anaquel:</label>
		<input type="number" min="1" max="5" id="txt Anaquel" name="anaquel" value="{{old('anaquel')}}">
		{!! $errors->first("anaquel", "<span class='red-text'>:message</span>")!!}
		<br>
		<button class="btn"> Enviar</button>

	</form>
	@endsection

