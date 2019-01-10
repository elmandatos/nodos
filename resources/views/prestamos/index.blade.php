@extends('layout')
@section('contenido')
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
		 <div class="input-field col s12">
          <i class="material-icons prefix">contacts</i>
          <input type="text" id="autocomplete-input" class="autocomplete">
          <label for="autocomplete-input">Usuario</label>
        </div>
        <form>
        	<div class="input-field col s12 l12">
        		<label for="Nombre">Pieza:</label>
        		<input type="text" name="Nombre">
        	</div>
        	<div class="input-field col s12 l12">
        		 <label for="Cantidad">Cantidad:</label>
        		 <input type="number" name="Cantidad">
        	</div>
        	<div class="right">
        	 <a class="btn-floating btn-small waves-effect waves-light red right-align"><i class="material-icons">add</i></a>
        	</div>
        </form>
        <br/>
   		<button class="waves-effect waves-light btn-small">Realizar Prestamo</button>
	</div>
</div>
@endsection