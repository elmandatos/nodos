getUsers();
let tr;
let td;

function getUsers(){
		axios.get('/prestamos/jsonUsers')
			.then( function(response){
				console.log(response.data);
				let divRow, divCol, divCollapsible, i, destiny, name;
				let nombre, apellido;
			    for (x in response.data) {
			    	// Dividir nombre completo en Primer nombre y Primer Apellido
			    	nombre   = response.data[x].nombreUsuario.split(" ");
			    	apellido = response.data[x].apellidoUsuario.split(" ");
			    	// alert(nombre);
			    	// Crear fila
			    	divRow = document.createElement('div');
				    divRow.setAttribute('class','row z-depth-1');
				    // Crear columna
				    divCol = document.createElement('div');
				    divCol.setAttribute('class','col s12 m12');
				    // Crear tarjeta clickeable
				    divCollapsible = document.createElement('div');
				    divCollapsible.setAttribute('class', 'collapsible-header');
				    // Crear icono
				    i = document.createElement('i');
				    i.setAttribute('class','material-icons');
				    i.innerHTML = "account_circle";
				    // Obtener destino
				    destiny = document.getElementById('users');
				    // Añadir elementos por jerarquia
				    divCollapsible.appendChild(i);
				    divCol.appendChild(divCollapsible);
				    divRow.appendChild(divCol);
				    // Añadir evento mediante un cierre (closure), permitiendo conservar los valores de nombre y apellido en tiempo de ejecucion
				    divCollapsible.addEventListener('click', getPrestamos.bind(null,nombre[0],apellido[0]));
				    // Añadir Nombre y Apellido a la tarjeta (Lo hago así para añadirlo al final del DIV)
				    name = document.createTextNode(nombre[0]+" "+apellido[0]);
				    divCollapsible.appendChild(name);
				    // Añadir todo de este usuario al DOM
				    destiny.appendChild(divRow);
			    }
			});
}

//
// 	axios.get('/prestamos/jsonPiezas')
// 		.then( function(response){
// 			// let tr, tdNumero, tdFoto, tdNombre, tdCantidad, img, destino;
// 			let tr = document.createElement('tr');
// 			let td = document.createElement('td');
// 			let img = document.createElement('img');
// 			console.log(response.data);
// 		    for (x in response.data) {
//
// 					//se agrega numero de Articulo
// 					// td.setAttribute("class", "columnaPequeña");
// 					// td.innerHTML = (parseInt(x)+1);
// 					// tr.appendChild(td);
// 					//
// 					//
// 		    	// tdNumero = document.createElement('td');
// 		    	// tdNumero.setAttribute('class', 'columnaPequeña');
// 		    	// tdNumero.innerHTML = (parseInt(x)+1);
// 					//
// 		    	// tdFoto = document.createElement('td');
// 					//
// 		    	// img = document.createElement('img');
// 		    	// img.style.width = '100%';
// 		    	// img.setAttribute('src', response.data[x].fotoPieza);
// 					//
// 		    	// tdNombre = document.createElement('td');
// 		    	// tdNombre.setAttribute('class', 'wordBreak');
// 		    	// tdNombre.innerHTML = response.data[x].nombrePieza;
// 					//
// 		    	// tdCantidad = document.createElement('td');
// 		    	// tdCantidad.innerHTML = response.data[x].cantidadPieza;
// 					//
// 		    	// destino = document.getElementById('bodyPiezas');
// 					//
// 		    	// tdFoto.appendChild(img);
// 		    	// tr.appendChild(tdNumero);
// 		    	// tr.appendChild(tdFoto);
// 		    	// tr.appendChild(tdNombre);
// 		    	// tr.appendChild(tdCantidad);
// 					//
// 		    	// destino.appendChild(tr);
// 		    }
// 			var elems = document.querySelectorAll('.materialboxed');
// 		    var instances = M.Materialbox.init(elems, {});
// 		});
//
// }
//
function getPrestamos(nombre,apellido){

	axios.get("/prestamos/jsonIdPrestamos/"+nombre+"/"+apellido)
	.then( function(response){
		// let trPrestamos, tdNumero, tdFoto, imgPrestamos, tdNombre, tdCantidad;
		// let tdAcciones, aTransferir, iTrasnferir, destinoBody, tabla, tbody, thead;
		// let trHeader, thNumero, thFoto, thNombre, thCantidad, thAcciones, destinoHeader;
		let tr = document.createElement("tr");
		let td = document.createElement("td");

	    for (x in response.data) {

				//se agrega id de la pieza
				td.setAttribute("id","headerPiezas");
				tr.appendChild(td);



				tabla.appendChild(tr);



	    	// thead = document.createElement('thead');
	    	// thead.setAttribute('id', 'headerPiezas');
				//
	    	// trHeader = document.createElement('tr');
				//
	    	// thNumero = document.createElement('th');
	    	// thNumero.setAttribute('class', 'columnaPequeña');
	    	// thNumero.innerHTML = "#";
				//
	    	// thFoto = document.createElement('th');
	    	// thFoto.innerHTML = "Foto";
				//
	    	// thNombre = document.createElement('th');
	    	// thNombre.innerHTML = "Articulo";
				//
	    	// thCantidad = document.createElement('th');
	    	// thCantidad.innerHTML = "Cantidad";
				//
	    	// thAcciones = document.createElement('th');
	    	// thAcciones.setAttribute('class', 'columnaMediana');
	    	// thAcciones.innerHTML = "Acciones";
				//
	    	// trHeader.appendChild(thNumero);
	    	// trHeader.appendChild(thFoto);
	    	// trHeader.appendChild(thNombre);
	    	// trHeader.appendChild(thCantidad);
	    	// trHeader.appendChild(thAcciones);
				//
	    	// tbody = document.createElement('tbody');
	    	// tbody.setAttribute('id','bodyPiezas');
				//
	    	// trPrestamos = document.createElement('tr');
				//
	    	// tdNumero = document.createElement('td');
	    	// tdNumero.setAttribute('class', 'columnaPequeña');
	    	// tdNumero.innerHTML = (parseInt(x)+1);
				//
	    	// tdFoto = document.createElement('td');
	    	// imgPrestamos = document.createElement('img');
	    	// imgPrestamos.style.width = '100%';
	    	// imgPrestamos.setAttribute('src', response.data[x].fotoPieza);
				//
	    	// tdNombre = document.createElement('td');
	    	// tdNombre.setAttribute('class', 'wordBreak');
	    	// tdNombre.innerHTML = response.data[x].nombrePieza;
				//
	    	// tdCantidad = document.createElement('td');
	    	// tdCantidad.setAttribute('class', 'columnaMediana');
	    	// tdCantidad.innerHTML = response.data[x].cantidadPrestamo;
				//
	    	// tdAcciones = document.createElement('td');
	    	// tdAcciones.setAttribute('class', 'columnaMediana');
	    	// aTransferir  = document.createElement('a');
	    	// aTransferir.setAttribute('class', 'waves-effect waves-light btn orange modal-trigger');
	    	// aTransferir.setAttribute('data-target', 'modal1');
				//
	    	// iTrasnferir = document.createElement('i');
	    	// iTrasnferir.setAttribute('class', 'material-icons right');
	    	// iTrasnferir.innerHTML = "swap_horiz";
				//
	    	// tdFoto.appendChild(imgPrestamos);
	    	// aTransferir.appendChild(iTrasnferir);
	    	// tdAcciones.appendChild(aTransferir);
				//
	    	// trPrestamos.appendChild(tdNumero);
	    	// trPrestamos.appendChild(tdFoto);
	    	// trPrestamos.appendChild(tdNombre);
	    	// trPrestamos.appendChild(tdCantidad);
	    	// trPrestamos.appendChild(tdAcciones);
				//
	    	// thead.appendChild(trHeader);
	    	// tbody.appendChild(trPrestamos);
				//
	    	// tabla = document.getElementById('tablaPiezas');
	    	// destinoHeader = document.getElementById('headerPiezas');
	    	// destinoBody = document.getElementById('bodyPiezas');
	    	// tabla.replaceChild(thead, destinoHeader);
	    	// tabla.replaceChild(tbody, destinoBody);
	    }
		// var elems = document.querySelectorAll('.materialboxed');
		// var instances = M.Materialbox.init(elems, {});
	});
}
//
// function transferirPrestamo(indice, id_usuario){
// 	var idPieza 	        = putParams.data[indice].idPieza;
// 	var cantidadPrestamo	= putParams.data[indice].cantidadPrestamo;
//
// 	axios.put("/prestamos/"+id_usuario, putParams)
// 		.then( function(response){
// 			M.toast({ html: "Prestamo actualizado" });
// 	    setTimeout(function() {
// 	        window.location.href = "/";
// 	    }, 2000);
// 		})
//
// 		.catch(function (error) {
//
// 	    M.toast({ html: "Upps, algo salió mal..." });
// 		});
// }
