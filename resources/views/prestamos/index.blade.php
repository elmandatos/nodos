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
				    <li>
				      <div class="collapsible-header"><i class="material-icons">account_circle</i>Usuario 1</div>
				      <div class="collapsible-body white"><span>Pieza 1, 5 y 7 prestados</span></div>
				    </li>
				    <li>
				      <div class="collapsible-header"><i class="material-icons">account_circle</i>Usuario 2</div>
				      <div class="collapsible-body white"><span>Pieza 1, 5 y 7 prestados</span></div>
				    </li>
				    <li>
				      <div class="collapsible-header"><i class="material-icons">account_circle</i>Usuario 3</div>
				      <div class="collapsible-body white"><span>Pieza 1, 5 y 7 prestados</span></div>
				    </li>
				  </ul>		 	
		</div>
	</div>
	<div class="col s4 teal lighten-4 z-depth-0">
		<h4>Piezas Prestadas</h4>
		<table class="highlight centered responsive-table">
		  <thead>
			<tr>
				<th>Foto</th>
				<th>Nombre</th>
				<th>Cantidad</th>
			</tr>
		   </thead>
			@foreach($piezas as $pieza)
			<tr>
				<td class="columnaFotoAlmacen"> <img class="fotoAlmacen materialboxed" src="{{ $pieza -> foto   }}" alt=""></td>
				<td> {{ $pieza -> nombre }}</td>
				<td> {{ $pieza -> cantidad }}</td>
			</tr>
			@endforeach
		</table>
	</div>
	<div class="col s4 teal lighten-4 z-depth-1">
		<h4>Prestar piezas</h4>
		 <div class="container">
		<form class="searchForm" action="{{route("prestamos.search")}}" method="get" autocomplete="off">
		        {!!csrf_field()!!}
			<div class="row">
    			<div class="col s12">
      				<div class="row">		        
					    <div class="input-field col s12">
					    	 <i class="material-icons prefix">contacts</i>
					        <input type="text" id="autocomplete-input" class="autocomplete" name="usuario_a_consultar" autofocus>
					        <label for="autocomplete-input">Buscar</label>
					    </div>
		    		</div>
    			</div>
  			</div>
		</form>
	</div>
        <form class="searchForm" action="{{route("prestamos.searchPieza")}}" method="get" autocomplete="off">
        	{!!csrf_field()!!}
        	<div class="input-field col s12 l12">
        		<input type="text" id="autocomplete-input-pieza" class="autocompleteP" name="pieza_a_consultar">
        		<label for="autocomplete-input-pieza">Pieza:</label>
        		
        	</div>
        </form>
        <div class="input-field col s12 l12">
        		 <label for="Cantidad">Cantidad:</label>
        		 <input type="number" name="Cantidad">
        	</div>
        	 <a class="btn-floating btn-small waves-effect waves-light red right"><i class="material-icons">add</i></a>
   		<button class="waves-effect waves-light btn-small">Realizar Prestamo</button>
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