@extends('layout')
@section('meta')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('noContainer')
<div class="almacen">
	<div class="container">
		<form class="searchForm" action="{{route("almacen.search")}}" method="get" autocomplete="off">
		        {!!csrf_field()!!}
			<div class="row">
    			<div class="col s12">
      				<div class="row">		        
					    <div class="input-field col s12">
					    	 <i class="material-icons prefix">search</i>
					        <input type="text" id="autocomplete-input" class="autocomplete" name="pieza_a_consultar" autofocus>
					        <label for="autocomplete-input">Buscar</label>
					    </div>
		    		</div>
    			</div>
  			</div>
		</form>
	</div>

	<table class="highlight centered responsive-table custom">
		<thead>
			<tr>
				<th>Foto</th>
				<th>Cantidad</th>
				<th>Articulo</th>
				<th>No. Serie</th>
				<th>Descripcion</th>
				<th>Anaquel</th>
				<th>Entrada</th>
				<th>Estado</th>
				<th>Acciones</th>
			</tr>
		</thead>
	@php
	$rowNumber=0;
	@endphp
	@foreach($piezas as $pieza)
	@php
	$rowNumber+=1;
	$rowName= "rowNumber".$rowNumber;
	@endphp
		<tr name="{{$rowName}}" id="{{$rowName}}">
			<td class="columnaMediana"> <img class="materialboxed" width="100%" src="{{ $pieza -> foto   }}" alt=""></td>
			<td> {{ $pieza -> cantidad }}</td>
			<td class="wordBreak"> {{ $pieza -> nombre }}</td>
			<td class="columnaMediana"> {{ $pieza -> modelo }}</td>
			<td class="wordBreak"> {{ $pieza -> descripcion }}</td>
			<td> {{ $pieza -> anaquel }}</td>
			<td class="columnaMediana"> {{ $pieza -> created_at }}</td>
			@php 
				$id_estado = $pieza -> id_estado;
				$estados = DB::table('estado')->select('nombre')->where('id', $id_estado )->get();
				$estado = $estados[0]->nombre;
				if     ($id_estado == 1) $color = "green";
				elseif ($id_estado == 2) $color = "blue";
				elseif ($id_estado == 3) $color = "grey";
				else   $color = "red";
			@endphp

			<td class="columnaMediana">
				<span id="estado" class="new badge {{$color}}" data-badge-caption="">{{$estado}}</span>
			</td>

			<td class="columnaGrande"> <a class="btn" href="{{ route('almacen.edit', $pieza->id_piezas)}}"> Editar</a> 
				<div class="inline" action="{{ route('almacen.destroy', $pieza->id_piezas) }}">
					{!! csrf_field() !!}
					{!! method_field('DELETE') !!}
					<button onclick="dialogDeleteConfirm({{$pieza->id_piezas}}, '{{csrf_token()}}', '{{$rowName}}');" class="btn red darken-3">Eliminar</button>
				</div>
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

	      <li><a href="{{route("piezasData.index")}}" class="btn-floating green" data-tippy-placement="left" data-tippy="Importar piezas"><i class="material-icons">cloud_upload</i></a></li>
	  </ul>
	</div>
	@if($makePages)
		<div class="center">
  		{{ $piezas->links() }}
		</div>
	@endif
	@endsection
	@section("scripts")
	  @extends("scripts/p5")
	  <script type="text/javascript" src="{{asset('/js/scriptsAlmacen/deletePieza.js')}}"></script>
	  <script type="text/javascript" src="{{asset('/js/scriptsAlmacen/scriptsMaterialize.js')}}"></script>
	  </script>
	@endsection
</div>