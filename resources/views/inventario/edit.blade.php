@extends('layout')
@section('contenido')
<h3>Editar elemento</h3>
	<div class="row">
      		<div class="col l4">
	        	<label style="font-size:15px;">Camara</label>
	          	<div id="canvasParent"></div>
	          	<button class="btn" id="capturar">Capturar
	            	<i class="material-icons right">photo_camera</i>
	          	</button>
      		</div>
		      <div class="col l4">
		        <label style="font-size:15px;">Foto actual</label>
		        <img class="col l12" id="desplegar" src="{{$pieza->foto}}" alt="">
      		</div>
 	</div>
	<form method="POST" action={{ route('almacen.update', $pieza->id_piezas) }}>
		{{-- materialize sirvio aqui para el foramto usando los extends y section --}}
		<div class="row">
	    {!! method_field('PUT')!!}
		{!! csrf_field() !!}
			<div class="input-field col s12 l6">
				<label for="">Nombre:</label>
				<input type="text" id="txtNombre" name="nombre" autofocus value="{{$pieza->nombre}}">
				{!! $errors->first("nombre", "<span class='red-text'>:message</span>")!!}
				<br>
			</div>

			<div class="input-field col s12 l6">
				<label for="">Modelo:</label>
				<input type="text" id="txtModelo" name="modelo" value="{{$pieza->modelo}}">
				<br>
			</div>
			
			<div class="input-field col s6 l6">
				<label for="">Descripcion:</label>
				<input type="text" id="txtDescripcion" name="descripcion" value="{{$pieza->descripcion}}">
				{!! $errors->first("descripcion", "<span class='red-text'>:message</span>")!!}
				<br>
			</div>

			<div class="input-field col s6 l3">
				<label for="">Cantidad:</label>
				<input type="number" min="1" id="txtCantidad" name="cantidad" value="{{$pieza->cantidad}}">
				{!! $errors->first("cantidad", "<span class='red-text'>:message</span>")!!}
				<br>
			</div>

			
			<div class="input-field col s6 l3">
				<label for="">Anaquel:</label>
				<input type="number" min="1" max="5" id="txt Anaquel" name="anaquel" value="{{$pieza->anaquel}}">
				{!! $errors->first("anaquel", "<span class='red-text'>:message</span>")!!}
				<br>
			</div>

			<div class="input-field col s12 l6">
	            <input hidden   id="foto" name="foto" type="text" value="{{$pieza->foto}}">
	            {!! $errors->first("foto", "<span class='red-text'>:message</span>")!!}
          	</div>


			<div class="input-field col s12 l6">
				<button class="btn"> Actualizar</button>
			</div>
		</div>
	
	</form>
@endsection
@section("scripts")
  @extends('scripts/p5')
  <script src="{{asset('/js/webcam.js')}}" type="text/javascript"></script>
  <script src="{{asset('/js/password.js')}}" type="text/javascript"></script>
  <script src="{{asset('/js/ajaxForModal/storeUserModal.js')}}"></script>

@endsection