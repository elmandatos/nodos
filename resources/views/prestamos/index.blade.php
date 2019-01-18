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
							$sumavalores=array();
						@endphp
					    @foreach($prestamos as $prestamo)
					    @php
					    	if (!(in_array($prestamo->id_usuario, $usuarios))) {
					    		array_push($usuarios,$prestamo->id_usuario);
					    	}
					    @endphp
					    @endforeach
					    @for($i=0;$i<count($usuarios); $i++)
					    	@php
					    		$banderita='true';
								$piecitas=array();
								$estados=array();
								$cantidadPrestamo=array();
					    		$usuarioPrestamo = DB::table('users')->select('nombres')->where('id', 'LIKE','%'.$usuarios[$i].'%')->first();
					    		$idpiezas = DB::table('prestamos')->select('id_piezas','cantidad')->where('id_usuario',$usuarios[$i])->where('estado','activo')->get();
					    		// var_dump($idpiezas);
					    		// var_dump($usuarios[$i]);
					     	@endphp
					     	@foreach($idpiezas as $idpieza)
					  			@php
					  				if(!(in_array($idpieza->id_piezas,$piecitas))){
					  					array_push($piecitas, $idpieza->id_piezas);
					  				}
					  				array_push($cantidadPrestamo, $idpieza->cantidad);
					  			@endphp
					     	@endforeach
					     	@php
					     		$Consultaestados  = DB::table('prestamos')->select('estado')->where('id_usuario',$usuarios[$i])->get();
					     	@endphp
					     	@foreach($Consultaestados as $Consultaestado)
					     		@php
					     			array_push($estados, $Consultaestado->estado);
					     		@endphp
					     	@endforeach
					     	@for($x=0;$x<count($estados);$x++)
					     		@php
					     			if ($estados[$x]==='activo') {
					     				$banderita='false';
					     			}
					     		@endphp
					     	@endfor
					     	@if($banderita==='false')
					     	<li>
					      	<div class="collapsible-header"><i class="material-icons">account_circle</i>{{ $usuarioPrestamo-> nombres }}</div>
					      	@for($j=0;$j<count($piecitas);$j++)
					      	@php
					      	// var_dump($piecitas[$j]);
					      	$sumavalores[$j]=0;
					      	$piecitasNombre = DB::table('piezas')->select('nombre')->where('id_piezas','LIKE','%'.$piecitas[$j].'%')->first();
					      	$piecitasCantidad = DB::table('prestamos')->select('cantidad')->where('id_piezas',$piecitas[$j])->where('id_usuario',$usuarios[$i])->where('estado','activo')->get();
					      	// var_dump($piecitas);
					      	// var_dump($piecitasNombre-> nombre);
					      	@endphp
					      	@foreach($piecitasCantidad as $piecitaCantidad)
								@php
									$sumavalores[$j]+=$piecitaCantidad->cantidad;
								@endphp
							@endforeach
					      	<div class="collapsible-body white"><span class="wordBreak">{{ $piecitasNombre -> nombre}}</span><br>
					      		<span class="wordBreak">Cantidad: {{ $sumavalores[$j] }}</span>
					      		@php
					      		$ab = DB::table('prestamos')->select('id')->where('id_usuario', $usuarios[$i])->where('id_piezas',$piecitas[$j])->where('estado','activo')->first();
					      		$id_ab = $ab->id;
					      		// var_dump($id_ab);
					      		@endphp
					      		<form class="inline" method="POST" action="{{route('prestamos.destroy',"$id_ab")}}">
					      			{!! csrf_field() !!}
									{!! method_field('DELETE') !!}
					      			<button class="btn">Devolver</button>
					      		</form>
					      		<button class="btn orange modal-trigger" data-target="modal{{$i}}"{{-- onclick="transferir()" --}}>Transferir</button>
					      		<div id="modal{{$i}}" class="modal">
								    <div class="modal-content">
								      <h4>Nuevo prestatario</h4>
								      	<div class="row">
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
											<form method="POST" action="{{route("prestamos.update","$id_ab")}}">
												{!! method_field('PUT')!!}
												{!! csrf_field() !!}
												<input class="classNombre" type="hidden" id="nombre" name="nombre" value="">
												<input type="hidden" id="piezas" name="piezas" value="{{$piecitas[$j]}}">
												<input type="hidden" name="cantidad" value="{{$sumavalores[$j]}}">
												<div class="modal-footer">
													<button class="btn">Actualizar</button>
											    </div>
											</form>
								      	</div>
								    </div>
								</div>
					      	</div>
					    @endfor
					    @endif
					    </li>
					@endfor
				</ul>		 	
			</div>
		</div>
		{{-- COLUMNA PIEZAS PRESTADAS --}}
		<div class="col s6 white lighten-4 z-depth-1" id="articulos_prestados">
			<table class="highlight centered responsive-table">
			  <thead>
			  	<h4 class="center-align"><b>Piezas Prestadas</b></h4>
				<tr>
					<th>Foto</th>
					<th>Nombre</th>
					<th>Cantidad</th>
				</tr>
			   </thead>
			   <tbody>
			   		@php
			   			$Tablapiezas = array();
			   			$Sumacantidad = array();
			   			$Piezas = DB::table('prestamos')->select('id_piezas')->where('estado','activo')->get();
			   		@endphp
			   		@foreach($Piezas as $pieza)
					    @php
					    	if (!(in_array($pieza->id_piezas, $Tablapiezas))) {
					    		array_push($Tablapiezas,$pieza->id_piezas);
					    	}
					    @endphp
					@endforeach
				   	@for($i=0;$i<count($Tablapiezas);$i++)
					@php
						$Sumacantidad[$i]=0;
						$pieza = DB::table('piezas')->select('nombre','cantidad','foto')->where('id_piezas', 'LIKE','%'.$Tablapiezas[$i].'%')->first();
						$pruebas = DB::table('prestamos')->select('cantidad')->where('id_piezas',$Tablapiezas[$i])->where('estado','activo')->get();
						@endphp
					@foreach($pruebas as $prueba)
						@php
							$Sumacantidad[$i]+=$prueba->cantidad;
						@endphp
					@endforeach
					<tr>
						<td > <img class="materialboxed" width="100%" src="{{ $pieza -> foto   }}" alt=""></td>
						<td class="wordBreak"> {{ $pieza -> nombre }}</td>
						<td> {{$Sumacantidad[$i]}}</td>
					</tr>
					@endfor
					@php
						/*var_dump($Sumacantidad[2]);*/
					@endphp
			   </tbody>
			</table>
		</div>
		{{-- COLUMNA FORMULARIO PRESTAR PIEZAS --}}
		<div class="col s3 blue-grey lighten-5 z-depth-1" id="formulario_prestamos">
			<h4 class="center-align"><b>Prestar piezas</b></h4>

			<div class="row">
				<form class="searchForm" action="{{route("prestamos.search")}}" method="get" autocomplete="off">
			    	{!!csrf_field()!!}
	    			<div class="col s12">
	      				<div class="row">		        
						    <div class="input-field col s12 l12">
						    	<i class="material-icons prefix">account_box</i>
						        <label for="usuario">Usuario:</label>
						        <input type="text" id="usuario" class="autocomplete" name="usuario_a_consultar" autofocus>
						        {!! $errors->first("hidden-nombre", "<span class='red-text'>:message</span>")!!}
						       
						    </div>
			    		</div>
	    			</div>
				</form>
  			</div>

	        <div class="row">
	        <form class="searchForm" action="{{route("prestamos.searchPieza")}}" method="get" autocomplete="off">
		        {!!csrf_field()!!}
					<div class="col s12">
	      				<div class="row">
				        	<div class="input-field col s12 l12">
				        		<i class="material-icons prefix">add</i>
				        		<input type="text" id="pieza" class="autocompleteP" name="pieza_a_consultar">
				        		<label for="pieza">Pieza:</label>
				        		{!! $errors->first("piezasH", "<span class='red-text'>:message</span>")!!}
				        		
				        	</div>
				        </div>
				    </div>
	        	</form>
		    </div>

			<div class="row">
	        	<form method="POST"  action={{route('prestamos.store')}}>
					{{ csrf_field() }}
					<input type="hidden" id="hidden-nombre" name="hidden-nombre" value="">
					<input type="hidden" id="piezasH" name="piezasH" value="">
						<div class="col s12">
		      				<div class="row">
								<div class="input-field col s12 l12">
									<i class="material-icons prefix">add</i>
						        	<input type="number" min="1" name="cantidad" id="cantidad">
						        	<label for="cantidad">Cantidad:</label>
						        	{!! $errors->first("cantidad", "<span class='red-text'>:message</span>")!!}
					        	</div>
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
</div>
@endsection
@section("scripts")
	  @extends("scripts/p5")
	  {{-- webcam.js permite hacer scroll el input [type="number"] --}}
	  <script src="{{asset('/js/webcam.js')}}" type="text/javascript"></script>
	  <script type="text/javascript" src="{{asset('/js/scriptPrestamos.js')}}"></script>
	  <script type="text/javascript" src="{{asset('/js/scriptPrestamoPieza.js')}}"></script>
	  <script type="text/javascript" src="{{asset('/js/scriptCambioPrestamo.js')}}"></script>
	  </script>
	@endsection