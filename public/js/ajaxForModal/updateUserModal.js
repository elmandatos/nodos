
let btnUpdate = $("button[name='update']");
let token = $("input[name='_token']").attr("value");
let errores = $(".red-text");
btnUpdate.click(function(e) {
    e.preventDefault();
    errores.each(function (r){
        $( this ).text("");
    });
    updateUser();
});



function updateUser() {
    let formData = $("#updateUser").serializeArray();
    let er = $(".red-text");
    let data = {};
    $.each(formData, function(){
        data[this.name] = this.value;

    });

    axios.put($("form").attr("action"), data)
        .then(function (response) {
            console.log(response);
            M.toast({ html: "Usuario Actualizado" });
            setTimeout(function() {
                window.location.href = "/users"
            }, 2000);
        })
        .catch(function (error) {
            let errors = error.response.data.errors;
            Object.keys(errors).forEach(function(key){
                let keyName = key+"-span";

                $("span[name="+keyName+"]").text(error.response.data.errors[key][0]);
            })


            M.toast({ html: "Upps, algo salió mal..." });
        });
}
