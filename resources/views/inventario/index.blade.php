@extends('layout')
@section('contenido')
<form action="{{route("almacen.search")}}" method="get">
        {!!csrf_field()!!}
    <div class="input-field col s12 l6">
        <input class="col s12 l10" type="text" name="pieza_a_consultar" id="pieza_a_consultar" value="" autofocus>
        <label for="pieza_a_consultar">Buscar</label>
    </div>
</form>

<table class="tabla">
<tr>
	<th>Foto</th>
	<th>Nombre</th>
	<th>Modelo</th>
	<th>Cantidad</th>
	<th>Descripcion</th>
	<th>Anaquel</th>
	<th>Entrada</th>
	<th>Acciones</th>
</tr>
@foreach($piezas as $pieza)
	<tr>
		<td class="columnaFotoAlmacen"> <img class="fotoAlmacen" src="{{ $pieza -> foto   }}" alt=""></td>
		<td> {{ $pieza -> nombre }}</td>
		<td> {{ $pieza -> modelo }}</td>
		<td> {{ $pieza -> cantidad }}</td>
		<td> {{ $pieza -> descripcion }}</td>
		<td> {{ $pieza -> anaquel }}</td>
		<td> {{ $pieza -> created_at }}</td>
		<td> <a class="btn" href="{{ route('almacen.edit', $pieza->id_piezas)}}"> Editar</a> 
			<form class="inline" method="POST" action="{{ route('almacen.destroy', $pieza->id_piezas) }}">
				{!! csrf_field() !!}
				{!! method_field('DELETE') !!}
				<button class="btn red darken-3" type="submit">Eliminar</button>
			</form>
		</td>
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