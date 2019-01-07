@extends('layout')
@section('contenido')
<table>
<tr>
	<th>nombre</th>
	<th>modelo</th>
	<th>cantidad</th>
	<th>descripcion</th>
	<th>anaquel</th>
	<th>entrada</th>
</tr>
@foreach($piezas as $pieza)
	<tr>
		<td> {{ $pieza -> nombre }}</td>
		<td> {{ $pieza -> modelo }}</td>
		<td> {{ $pieza -> cantidad }}</td>
		<td> {{ $pieza -> descripcion }}</td>
		<td> {{ $pieza -> anaquel }}</td>
		<td> {{ $pieza -> created_at }}</td>
	</tr>
@endforeach
</table>
<button>Crear</button>
@endsection