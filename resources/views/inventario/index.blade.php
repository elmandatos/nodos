@extends('layout')
@section('meta')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('noContainer')
<div class="almacen">
<div class="row principal">
	<div class="col s3 white lighten-5 z-depth-1">
		<h4 class="center-align"><b>Prestatarios</b></h4>
		<div class="container">
			<ul class="collapsible">
					@php
						$usuarios=array();
					@endphp
				    @foreach($prestamos as $prestamo)
				    {{-- <li> --}}
				    	@php
				    		if (!(in_array($prestamo->id_usuario, $usuarios))) {
				    			array_push($usuarios,$prestamo->id_usuario);
				    		}
				    	@endphp
				    @endforeach
				    @for($i=0;$i<count($usuarios); $i++)
				    	@php
							$piecitas=array();
				    		$usuarioPrestamo = DB::table('users')->select('nombres')->where('id', 'LIKE','%'.$usuarios[$i].'%')->first();
				    		$idpiezas = DB::table('prestamos')->select('id_piezas')->where('id_usuario','LIKE','%'.$usuarios[$i].'%')->get();
				    		var_dump($idpiezas);
				     	@endphp
				     	@foreach($idpiezas as $idpieza)
				  			@php
				  				array_push($piecitas, $idpieza->id_piezas);
				  			@endphp
				     	@endforeach
				     	<li>
				      	<div class="collapsible-header"><i class="material-icons">account_circle</i>{{ $usuarioPrestamo-> nombres }}</div>
				      	@for($j=0;$j<count($piecitas);$j++)
				      	@php
				      	var_dump($piecitas[$j]);
				      	$piecitasNombre = DB::table('piezas')->select('nombre')->where('id_piezas','LIKE','%'.$piecitas[$j].'%')->first();
				      	// var_dump($piecitasNombre-> nombre);
				      	@endphp
				      	<div class="collapsible-body white"><span class="wordBreak">{{ $piecitasNombre -> nombre}}</span></div>
				    @endfor
				    </li>
				 	@for($j=0;$j<count($piecitas);$j++)
				 		@php
				 			array_pop($piecitas);
				 		@endphp
				 	@endfor

				    {{-- </li> --}}
				    @endfor
			</ul>		 	
		</div>
	</div>
	<div class="col s6 white lighten-4 z-depth-1" id="articulos_prestados">
		<h4 class="center-align"><b>Piezas Prestadas</b></h4>
		<table class="highlight centered responsive-table">
		  <thead>
			<tr>
				<th>Foto</th>
				<th>Nombre</th>
				<th>Cantidad</th>
			</tr>
		   </thead>
			@foreach($prestamos as $prestamo)
			@php
				$pieza = DB::table('piezas')->select('nombre','cantidad','foto')->where('id_piezas', 'LIKE','%'.$prestamo->id_piezas.'%')->first();
			@endphp
			<tr>
				<td class="columnaMediana"> <img class="materialboxed" width="100%" src="{{ $pieza -> foto   }}" alt=""></td>
				<td class="wordBreak"> {{ $pieza -> nombre }}</td>
				<td> {{ $prestamo -> cantidad }}</td>
			</tr>
			@endforeach
		</table>
	</div>
	<div class="col s3 blue-grey lighten-5 z-depth-1" id="formulario_prestamos">
		<h4 class="center-align"><b>Prestar piezas</b></h4>
			{{-- <div class="container"> --}}
				<form class="searchForm" action="{{route("prestamos.search")}}" method="get" autocomplete="off">
				    {!!csrf_field()!!}
					<div class="row">
		    			<div class="col s12">
		      				<div class="row">		        
							    <div class="input-field col s12 l12">
							    	<i class="material-icons prefix">account_box</i>
							        <input type="text" id="autocomplete-input" class="autocomplete" name="usuario_a_consultar" autofocus>
							        <label for="autocomplete-input">Usuario:</label>
							    </div>
				    		</div>
		    			</div>
		  			</div>
				</form>
			{{-- </div> --}}
	        <form class="searchForm" action="{{route("prestamos.searchPieza")}}" method="get" autocomplete="off">
	        	{!!csrf_field()!!}
	        	<div class="input-field col s12 l12">
	        		<i class="material-icons prefix">add</i>
	        		<input type="text" id="autocomplete-input-pieza" class="autocompleteP" name="pieza_a_consultar">
	        		<label for="autocomplete-input-pieza">Pieza:</label>
	        	</div>
	        </form>
	        
	        

        <form method="POST"  action={{route('prestamos.store')}}>
		{{ csrf_field() }}
			<input type="hidden" id="hidden-nombre" name="hidden-nombre" value="">
			<input type="hidden" id="piezasH" name="piezasH" value="">
			<div class="row">
				<div class="input-field col s12 l12">
	        	<label for="Cantidad">Cantidad:</label>
	        	<input type="number" name="cantidad" id="cantidad">
	        </div>
			</div>
			<a class="btn-floating btn-small waves-effect waves-light red right"><i class="material-icons">add</i></a>
	        <div class="center">
	   			<button class="waves-effect waves-light btn-small">Realizar Prestamo</button>
	        </div>

		</form>


	</div>
</div>
</div>
@endsection
@section("scripts")
	  @extends("scripts/p5")
	  <script type="text/javascript" src="{{asset('/js/scriptPrestamos.js')}}"></script>
	  <script type="text/javascript" src="{{asset('/js/scriptPrestamoPieza.js')}}"></script>
	  </script>
	@endsection