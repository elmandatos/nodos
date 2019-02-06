// Autocompletador en la busqueda del searchbar de index de Users
document.addEventListener('DOMContentLoaded', function() {
	$.ajaxSetup({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});

	$.ajax({
		url: '/users/buscar',
		type: 'POST',
		success: function(response){
			var nameArray = JSON.parse(response);
	        var dataName = {};
	        for (var i = 0; i < nameArray.length; i++) {
	          // alert(nameArray[i].nombre);
	          dataName[nameArray[i].nombres] = nameArray[i].foto; //nameArray[i].flag or null
	        }
	        var elems = document.querySelectorAll('.autocomplete');
		    var instances = M.Autocomplete.init(elems, {
		      data: dataName,
		      limit: 5,
		      minLength: 1,
		      onAutocomplete: function(val){
		      	$(".searchForm").submit();
		      }
		    });
		}
	});
  });