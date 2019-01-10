@extends('layout')
@section('contenido')
<h3>Añadir nuevo elemento</h3>
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
        <img class="col l12" id="desplegar" src="{{asset("box.png")}}" alt="">
      </div>
  </div>
	<form method="POST" action={{route('almacen.store')}}>
		{{-- materialize sirvio aqui para el foramto usando los extends y section --}}
		
		<div class="row">
		{{ csrf_field() }}
			<div class="input-field col s12 l6">
				<label for="">Nombre:</label>
				<input type="text" id="txtNombre" name="nombre" autofocus value="{{old('nombre')}}">
				{!! $errors->first("nombre", "<span class='red-text'>:message</span>")!!}
				<br>
			</div>

			<div class="input-field col s12 l6">
				<label for="">Modelo:</label>
				<input type="text" id="txtModelo" name="modelo" value="{{old('modelo')}}">
				<br>
			</div>
			
			<div class="input-field col s6 l6">
				<label for="">Descripcion:</label>
				<input type="text" id="txtDescripcion" name="descripcion" value="{{old('descripcion')}}">
				{!! $errors->first("descripcion", "<span class='red-text'>:message</span>")!!}
				<br>
			</div>

			<div class="input-field col s6 l3">
				<label for="">Cantidad:</label>
				<input type="number" min="1" id="txtCantidad" name="cantidad" value="{{old('cantidad')}}">
				{!! $errors->first("cantidad", "<span class='red-text'>:message</span>")!!}
				<br>
			</div>

			
			<div class="input-field col s6 l3">
				<label for="">Anaquel:</label>
				<input type="number" min="1" max="5" id="txt Anaquel" name="anaquel" value="{{old('anaquel')}}">
				{!! $errors->first("anaquel", "<span class='red-text'>:message</span>")!!}
				<br>
			</div>

			<div class="input-field col s12 l6">
            <input hidden   id="foto" name="foto" type="text" value="">
            {!! $errors->first("foto", "<span class='red-text'>:message</span>")!!}
          	</div>


			<div class="input-field col s12 l6">
				<button class="btn"> Enviar</button>
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

