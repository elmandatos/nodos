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
<div class="fixed-action-btn">
  <a class="btn-floating btn-large red">
    <i class="large material-icons">more_vert</i>
  </a>
  <ul>
      <li><a href="{{route("almacen.create")}}" class="btn-floating" data-tippy-placement="left" data-tippy="Nuevo Articulo"><i class="material-icons">add</i></a></li>
  </ul>
</div>
@endsection