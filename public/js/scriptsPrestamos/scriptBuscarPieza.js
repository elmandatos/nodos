// ZOOM a las imagenes del alamacen en la vista index
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems, {});
  });

// Autocompletador en la busqueda del searchbar de index de almacen
document.addEventListener('DOMContentLoaded', function() {
	$.ajaxSetup({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});

	$.ajax({
		url: '/prestamos/buscarPieza',
		type: 'POST',
		success: function(response){
			var nameArray = JSON.parse(response);
	        var dataName = {};
	        var idData= {};
	        for (var i = 0; i < nameArray.length; i++) {
	          // alert(nameArray[i].nombre);
	          dataName[nameArray[i].nombre]= nameArray[i].foto; //nameArray[i].flag or null
	          idData[nameArray[i].nombre]=nameArray[i].id_piezas;
	        }
	        var elems = document.querySelectorAll('.autocompleteP');
		    var instances = M.Autocomplete.init(elems, {
		      data: dataName,
		      limit: 3,
		      minLength: 1,
		      onAutocomplete: function(val){
		      	$("#piezasH").val(idData[val]);
		      }
		    });
		}
	});
  });