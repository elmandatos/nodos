
let btnUpdate = $("button[name='update']");
let token = $("input[name='_token']").attr("value");
let errores = $(".red-text");
btnUpdate.click(function(e) {
    e.preventDefault();
    errores.each(function (r){
        $( this ).text("");
    });
    updateUser($("#updateUser").attr("action"));
});



function updateUser($url) {
    let formData = $("#updateUser").serializeArray();
    let er = $(".red-text");
    let data = {};
    $.each(formData, function(){
        data[this.name] = this.value;

    });

    axios.put($("#updateUser").attr("action"), data)
        .then(function (response) {
            // console.log(response);
            M.toast({ html: "Usuario Actualizado" });
            setTimeout(function() {
                window.location.href = "/users"
            }, 2000);
        })
        .catch(function (error) {
            let errors = error.response.data.errors;
            Object.keys(errors).forEach(function(key){
                let keyId = key+"-span";

                $("span[id="+keyId+"]").text(error.response.data.errors[key][0]);
            })

            M.toast({ html: "Upps, algo salió mal..." });
        });
}
