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

                          $("tr[name="+rowName+"]").remove();
                          M.toast({html: "Pieza Eliminada",displayLength:2000});
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
