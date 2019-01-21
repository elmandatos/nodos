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
		url: '/prestamos/buscarUsuarios',
		type: 'POST',
		success: function(response){
			var nameArray = JSON.parse(response);
	        var dataName = {};
	        var idData = {};
	        for (var i = 0; i < nameArray.length; i++) {
	          // alert(nameArray[i].nombre);
	          dataName[nameArray[i].nombres+" "+nameArray[i].apellidos]= nameArray[i].foto; //nameArray[i].flag or null
	          idData[nameArray[i].nombres+" "+nameArray[i].apellidos]=nameArray[i].id;
	        }
	        var elems = document.querySelectorAll('.autocomplete');
		    var instances = M.Autocomplete.init(elems, {
		      data: dataName,
		      limit: 3,
		      minLength: 1,
		      onAutocomplete: function(val){
		      	//$(".searchForm").submit();
		      	$("#hidden-nombre").val(idData[val]);
		      	$("#nombre").val(idData[val]);
		      }
		    });
		}
	});
  });