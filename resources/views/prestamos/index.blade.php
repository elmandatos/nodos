@extends('layout')
@section('meta')
	<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('noContainer')
<div class="almacen">
	<div class="row principal">
		{{-- COLUMNA PRESTATARIOS --}}
		<div class="col s3 white lighten-5 z-depth-1" id="prestatarios">
			<h4 class="center-align"><b>Prestatarios</b></h4>
			<div class="container" id="users"></div>
		</div>

		{{-- COLUMNA PIEZAS PRESTADAS --}}
		<div class="col s6 white lighten-4 z-depth-1" id="articulos_prestados"></div>
		<div id="modal1" class="modal">
		    <div class="modal-content">
		      <h4>Nuevo prestatario</h4>
		      	<div class="row">
	    			<div class="col s12">
	      				<div class="row">		        
						    <div class="input-field col s12 l12">
						    	<i class="material-icons prefix">account_box</i>
						        <input type="text" id="transferir" class="autocomplete" name="usuario_a_consultar" autofocus>
						        <label for="transferir">Usuario:</label>
						    </div>
			    		</div>
	    			</div>
					<form action="" method="POST">
						{!! method_field('PUT')!!}
						{!! csrf_field() !!}
						<div class="modal-footer">
							<button class="btn" id="update" >Actualizar</button>
					    </div>
					</form>
		      	</div>
		    </div>
		</div>
		{{-- COLUMNA FORMULARIO PRESTAR PIEZAS --}}
		<div class="col s3 blue-grey lighten-5 z-depth-1" id="formulario_prestamos">
			<h4 class="center-align"><b>Prestar piezas</b></h4>

			<div class="row noMargin">
				<form class="searchForm" action="{{route("prestamos.searchUsuarios")}}" method="get" autocomplete="off">
			    	{!!csrf_field()!!}
	    			<div class="col s12">
	      				<div class="row noMargin">		        
						    <div class="input-field col s12 l12">
						    	<i class="material-icons prefix">account_box</i>
						        <label for="usuario">Usuario</label>
						        <input type="text" id="usuario" class="autocomplete" name="usuario_a_consultar" autofocus>
						    </div>
			    		</div>
	    			</div>
				</form>
  			</div>

	        <div class="row">
	        	<form class="searchForm" action="{{route("prestamos.searchPieza")}}" method="get" autocomplete="off">
		        {!!csrf_field()!!}
					<div class="col s12 l8">
	      				<div class="row noMargin">
				        	<div class="input-field col s12 l12">
				        		<i class="material-icons prefix">business_center</i>
				        		<input type="text" id="pieza" class="autocompleteP" name="pieza_a_consultar">
				        		<label for="pieza">Pieza</label>
				        	</div>
				        </div>
				    </div>
	        	</form>
		    
	        	<form method="POST"  action={{route('prestamos.store')}}>
					{{ csrf_field() }}
					<input type="hidden" id="hidden-nombre" name="hidden-nombre" value="">
					<input type="hidden" id="piezasH" name="piezasH" value="">
						<div class="col s12 l4">
		      				<div class="row noMargin">
								<div class="input-field col s12 l12">
						        	<input type="number" min="1" name="cantidad" id="cantidad">
						        	<label for="cantidad">Cantidad</label>
						        	<a class="btn-floating btn-small waves-effect waves-light red right"><i class="material-icons">add</i></a>
					        	</div>
					        </div>
					</div>
					<div class="row center-align">
			   			<button class="waves-effect waves-light btn-small">Realizar Prestamo</button>
			        </div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section("scripts")
	  @extends("scripts/p5")
	  <script src="{{asset('/js/scriptsPrestamos/getJsonTables.js')}}"></script>
	  <script src="{{asset('/js/scriptsPrestamos/scriptBuscarUsuario.js')}}"></script>
	  <script src="{{asset('/js/scriptsPrestamos/scriptBuscarPieza.js')}}"></script>
	  {{-- <script src="{{asset('/js/scriptsPrestamos/scriptCambioPrestamo.js')}}"></script> --}}
	@endsection