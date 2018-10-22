
let btnStore = $("button[name='store']");
let url = $("#formulario").attr("action");
let token = $("input[name='_token']").attr("value");
let error = $(".red-text")[0];
let createUserForm = $("#formulario").serialize();
btnStore.click(function(e) {
    e.preventDefault();
    storeUser();
});

function storeUser() {
    let formData = $("#formulario").serializeArray();
    let data = {};
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
            let errors = error.response.data.errors;
            errors.forEach(function(campo){
                console.log(campo);
            })
            M.toast({ html: "Upps, algo salió mal..." });
        });
}
