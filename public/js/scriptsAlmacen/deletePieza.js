function dialogDeleteConfirm(id, token, rowName){

  MaterialDialog.dialog(
  	"¿Está seguro de eliminar este articulo?",
  	{
  		title:"¡Advertencia!",
  		modalType:"", // Can be empty, modal-fixed-footer or bottom-sheet
  		buttons:{
  			// Use by default close and confirm buttons
  			close:{
  				className:"red",
  				text:"Cerrar",
  				callback:function(){
  				}
  			},

            confirm:{
  				className:"blue",
  				text:"Aceptar",
  				modalClose:true,
  				callback:function(){
                    $.ajax({
                      type: "post",
                      url: "/almacen/"+id,
                      data: {

                        _method: "delete",
                        _token: token
                      },
                      success: function(result) {

                          var estado = $("tr[name="+rowName+"]").find("td > span");
                          estado.html("No Disponible");
                          estado.attr('class','new badge grey');

                          var botonDeshabilitar = $("tr[name="+rowName+"]").find("td > div > button");
                          botonDeshabilitar.attr('class', 'btn green darken-3');
                          botonDeshabilitar.html("Habilitar");
                          M.toast({html: "Pieza deshabilitada",displayLength:2000});
                          // location.reload();

                      },
                      error: function(result) {

                          M.toast({
                            html: "Upps, algo salió mal...",

                          });
                      }
                    });
  				}
  			}
  		}
  	}
  );
};
