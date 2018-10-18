function dialogConfirm(id, token, cardName){

  MaterialDialog.dialog(
  	"¿Está seguro de eliminar este usuario?",
  	{
  		title:"¡Advertencia!",
  		modalType:"", // Can be empty, modal-fixed-footer or bottom-sheet
  		buttons:{
  			// Use by default close and confirm buttons
  			close:{
  				className:"red",
  				text:"Cerrar",
  				callback:function(){
                    M.toast({
                      html: "Upps, algo salió mal...",

                    });
                    setTimeout(function() {
                      location.reload();
                    },4000)
  				}
  			},

            confirm:{
  				className:"blue",
  				text:"Aceptar",
  				modalClose:true,
  				callback:function(){
                    $.ajax({
                      type: "post",
                      url: "/users/"+id,
                      data: {

                        _method: "delete",
                        _token: token
                      },
                      success: function(result) {

                          $("div[name="+cardName+"]").remove();
                          M.toast({html: "Usuario Eliminado",displayLength:2000});
                          location.reload();

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
