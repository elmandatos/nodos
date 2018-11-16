// let anchorsGetIn = $("a.entrada");
// let anchorsGetOut = $("a.salida");
// let divCards = $(".entrada")
// // console.log(divCards);
//
// $(divCards).each();

//desactivar eventos por defecto
// $("div.cards").click(function(e) {
//     e.preventDefault();
//     console.log();
// });

//se agrega evento para buscar el
$(".userCard").click(function(cardUser) {
    if(cardUser.target.tagName == "A"){
        if(cardUser.target.className == "entrada"){
            cardUser.preventDefault();
            get(cardUser.target.href,"Entrada")
        }
        if(cardUser.target.className == "salida"){
            cardUser.preventDefault();
            get(cardUser.target.href,"Salida");
        }
    }
});


//llamada con mensaje perzonalido
function get(url,accion){

    axios.get(url)
      .then(function (response) {
        // handle success

        M.toast({ html: accion+" registrada"});
        setTimeout(function() {
            window.location.href = "/"
        }, 2000);

      })
      .catch(function (error) {
        // handle error
        M.toast({ html: "Upps, algo salió mal..." });
      })
}
