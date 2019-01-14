@extends('layout')
@section('meta')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('noContainer')
<div class="almacen">
<div class="row">
	<div class="col s4 teal lighten-5 z-depth-1">
		<h4>Prestatarios</h4>
		<div class="container">
			<ul class="collapsible">
				    @foreach($prestamos as $prestamo)
				    @php
				     $usuarioPrestamo = DB::table('users')->select('nombres')->where('id', 'LIKE','%'.$prestamo->id_usuario.'%')->first();
				     $piezaPrestamo = DB::table('piezas')->select('nombre')->where('id_piezas', 'LIKE','%'.$prestamo->id_piezas.'%')->first();
				    @endphp
				    <li>
				      <div class="collapsible-header"><i class="material-icons">account_circle</i>{{ $usuarioPrestamo-> nombres }}</div>
				      <div class="collapsible-body white"><span>{{ $piezaPrestamo -> nombre}}</span></div>
				    </li>
				    @endforeach
			</ul>		 	
		</div>
	</div>
	<div class="col s4 teal lighten-4 z-depth-0">
		<h4>Piezas Prestadas</h4>
		<table class="highlight centered responsive-table">
		  <thead>
			<tr>
				{{-- <th>Foto</th> --}}
				<th>Nombre</th>
				<th>Cantidad</th>
			</tr>
		   </thead>
			@foreach($piezas as $pieza)
			<tr>
				{{-- <td class="columnaFotoAlmacen"> <img class="fotoAlmacen materialboxed" src="{{ $pieza -> foto   }}" alt=""></td> --}}
				<td> {{ $pieza -> nombre }}</td>
				<td> {{ $pieza -> cantidad }}</td>
			</tr>
			@endforeach
		</table>
	</div>
	<div class="col s4 teal lighten-4 z-depth-1">
		<h4>Prestar piezas</h4>
		

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