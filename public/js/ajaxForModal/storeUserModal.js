let btnStore = $("button[name='store']");
let url = $("#formulario").attr("action");
let token = $("input[name='_token']").attr("value");
let createUserForm = $("#formulario").serialize();
btnStore.click(function(e) {
    e.preventDefault();
    storeUser();
});

function storeUser() {
    $.ajax({
        type: "post",
        url: "/users",
        data: {
            _token: token,
            form : $("#formulario").serialize()

        },
        success: function(result) {
            M.toast({html: "Usuario Creado"});
            // $(location).attr('href', url);
        },
        error: function(result) {
            M.toast({html: "Upps, algo salió mal..."});
        }
    });
}





//
// function dialogConfirm(){
//   MaterialDialog.dialog(
//   	"¿Está seguro de eliminar este usuario?",
//   	{
//   		title:"¡Advertencia!",
//   		modalType:"", // Can be empty, modal-fixed-footer or bottom-sheet
//   		buttons:{
//   			// Use by default close and confirm buttons
//   			close:{
//   				className:"red",
//   				text:"Cerrar",
//   				callback:function(){
//   				}
//   			},
//
//             confirm:{
//   				className:"blue",
//   				text:"Aceptar",
//   				modalClose:true,
//   				callback:function(){
//                     $.ajax({
//                       type: "post",
//                       url: "/users/"+id,
//                       data: {
//
//                         _method: "delete",
//                         _token: token
//                       },
//                       success: function(result) {
//
//                           $("div[name="+cardName+"]").remove();
//                           M.toast({html: "Usuario Creado",displayLength:4000});
//                           location.reload();
//
//                       },
//                       error: function(result) {
//
//                           M.toast({
//                             html: "Upps, algo salió mal...",
//
//                           });
//                       }
//                     });
//   				}
//   			}
//   		}
//   	}
//   );
// };
