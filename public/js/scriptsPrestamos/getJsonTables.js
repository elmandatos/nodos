window.onload = function(){
	var putParams;
	axios.get('/prestamos/jsonUsers')
		.then( function(response){
			var txt = "";
			var nombre, apellido;
		    for (x in response.data) {
		    	nombre   = response.data[x].nombreUsuario.split(" ");
		    	apellido = response.data[x].apellidoUsuario.split(" ");
			    txt += "<div class='row z-depth-1'>";
			    txt += "<div class='col s12 m12'>";
			    txt += '<div class="collapsible-header" onclick="getPrestamos("'+nombre[0]+'","'+apellido[0]+'")">';
			    txt += "<i class='material-icons'>account_circle</i>"+nombre[0]+" "+apellido[0];
			    txt += "</div></div></div>";
		    } 
			document.getElementById('users').innerHTML = txt;
		});

	axios.get('/prestamos/jsonPiezas')
		.then( function(response){
			var txt = "";
			txt += "<table class='highlight centered responsive-table'>"
			txt += "<thead><h4 class='center-align'><b>Piezas Prestadas</b></h4>"
			txt += "<tr><th style='width:10%'>#</th><th>Foto</th><th>Articulo</th><th>Cantidad</th></tr></thead>"
			txt += "<tbody>"
		    for (x in response.data) {
		      txt += "<tr><td style='width:10%'>"+(parseInt(x)+1)+"</div>";
		      txt += "<td><img width='100%' src='" + response.data[x].fotoPieza + "'></td>";
		      txt += "<td class='wordBreak'>" + response.data[x].nombrePieza + "</td>";
		      txt += "<td>" + response.data[x].cantidadPieza + "</td></tr>";
		    }
		    txt += "</tbody></table>"    
			document.getElementById('articulos_prestados').innerHTML = txt;
			var elems = document.querySelectorAll('.materialboxed');
		    var instances = M.Materialbox.init(elems, {});
		});

}

function getPrestamos(nombre,apellido){

	axios.get("/prestamos/jsonIdPrestamos/"+nombre+"/"+apellido)
	.then( function(response){
		putParams = response;
		var txt = "";
		var x = 0;
		txt += "<table class='highlight centered responsive-table'>"
		txt += "<thead><h4 class='center-align'><b>Piezas Prestadas</b></h4>"
		txt += "<tr><th style='width:10%'>#</th><th>Foto</th><th>Articulo</th><th style='width:10%;'>Cantidad</th><th>Acciones</th></tr></thead>"
		txt += "<tbody>"
	    for (x in response.data) {
	      	txt += "<tr><td style='width:10%;'>"+(parseInt(x)+1)+"</td>";
	      	txt += "<td><img width='100%' src='" + response.data[x].fotoPieza + "'></td>";
		    txt += "<td class='wordBreak'>" + response.data[x].nombrePieza + "</td>";
		    txt += "<td style='width:10%;'>" + response.data[x].cantidadPrestamo + "</td>";
		    txt += "<td><a class='waves-effect waves-light btn orange modal-trigger' data-target='modal1' onclick='transferirPrestamo("+x+","+id_usuario+")'>";
		    txt += "<i class='material-icons right'>swap_horiz</i>Transferir</a></td></tr>";
	    }
	    txt += "</tbody></table>"
		document.getElementById('articulos_prestados').innerHTML = txt;
		var elems = document.querySelectorAll('.materialboxed');
		var instances = M.Materialbox.init(elems, {});
	});
}

function transferirPrestamo(indice, id_usuario){
	var idPieza 	        = putParams.data[indice].idPieza;
	var cantidadPrestamo	= putParams.data[indice].cantidadPrestamo;

	axios.put("/prestamos/"+id_usuario, putParams)
		.then( function(response){
			M.toast({ html: "Prestamo actualizado" });
	    setTimeout(function() {
	        window.location.href = "/";
	    }, 2000);
		})

		.catch(function (error) {

	    M.toast({ html: "Upps, algo salió mal..." });
		});
}
