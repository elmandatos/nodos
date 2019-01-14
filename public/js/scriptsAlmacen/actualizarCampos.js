var cantidad = document.getElementById("txtCantidad");
var estado = document.getElementById("txtEstado");
var numero = cantidad.value;
var indice = estado.value;

estado.addEventListener("change",function(e){});
cantidad.addEventListener("change",function(e){});

function cambiarEstado(){
	if(cantidad.value != "")
	{
		if(cantidad.value == 0)
		{
			estado.value = 3;
		}else{
			if(indice == 3)
				estado.value = 1;
			else
				estado.value = indice;

		}
		estado.dispatchEvent(new Event('change'));
	}
}

function cambiarCantidad(){
	indice = estado.value;
		if(indice == 3)
		{
			cantidad.value = 0;
		}
}