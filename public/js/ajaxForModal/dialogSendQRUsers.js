function dialogSendQRUsers(){

  MaterialDialog.dialog(
  	"¿Está seguro de que desea enviar el QR a cada usuario?",
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
                      type: "get",
                      url: "users/sendEmail",
                      success: function(result) {

                          M.toast({html: "Correos enviados",displayLength:2000});
                          window.location.href = "/";

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
