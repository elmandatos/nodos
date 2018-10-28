document.getElementById('usuario').defaultChecked = true;
let btnStore = $("button[name='store']");
let url = $("#formulario").attr("action");
let token = $("input[name='_token']").attr("value");
btnStore.click(function(e) {
    e.preventDefault();
    let errores = $(".red-text");
    errores.each(function (r){
        // console.log($(this));
        $( this ).text("");
    });
    if(passwordMatch)
        storeUser();
});



function storeUser() {
    let formData = $("#formulario").serializeArray();
    let er = $(".red-text");
    let data = {};
    $.each(formData, function(){
        data[this.name] = this.value;

    });

    axios.post('/users', data)
        .then(function (response) {
            // console.log(response);
            M.toast({ html: "Usuario Creado" });
            setTimeout(function() {
                window.location.href = "/users/create";
            }, 2000);
        })
        .catch(function (error) {
            let errors = error.response.data.errors;
            Object.keys(errors).forEach(function(key){
                let keyId = key+"-span";
                // console.log(keyId);
                $("span[id="+keyId+"]").text(error.response.data.errors[key][0]);
            })


            M.toast({ html: "Upps, algo salió mal..." });
        });
}
