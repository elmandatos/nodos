
let btnStore = $("button[name='store']");
let url = $("#formulario").attr("action");
let token = $("input[name='_token']").attr("value");
let createUserForm = $("#formulario").serialize();
btnStore.click(function(e) {
    e.preventDefault();
    storeUser();
});

function storeUser() {
    let formData = $("#formulario").serializeArray();
    let data = {};
    console.log(formData);
    $.each(formData, function(){
        data[this.name] = this.value;
        
    });

    axios.post('/users', data)
        .then(function (response) {
            console.log(response);
            M.toast({ html: "Usuario Creado" });
            setTimeout(function() {
                window.location.href = "/users"; 
            }, 2000);
        })
        .catch(function (error) {
            console.error(error.response.data);
            M.toast({ html: "Upps, algo salió mal..." });
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
