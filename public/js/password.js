let radioBtns = document.getElementById("userType");
let divPassword = document.getElementById("divPassword");
let labelPassword = document.getElementById("labelPassword");
let labelPasswordConfirm = document.getElementById("labelPasswordConfirm");
let divPasswordConfirm = document.getElementById("divPasswordConfirm");

//se crean etiquetas para el DOM
let spanPassword = document.createElement("span");
let inputPassword = document.createElement("input");
let spanPasswordConfirm = document.createElement("span");
let inputPasswordConfirm = document.createElement("input");

//se asignan atributos a las etiquetas
inputPassword.type = "password";
inputPassword.name = "password";
inputPassword.id = "password";
inputPassword.required= true;

spanPassword.className = "red-text";
spanPassword.id = "password-span";

inputPasswordConfirm.type = "password";
inputPasswordConfirm.name = "confirmarContraseña";
inputPasswordConfirm.id = "confirmarContraseña";
inputPasswordConfirm.required= true;

spanPasswordConfirm.className = "red-text";
spanPasswordConfirm.id = "confirmarContraseña-span";


userType.addEventListener("click",(event)=>{
    if(event.target.tagName == "INPUT"){
        if(event.target.value != "usuario"){
            console.log(spanPassword);
            divPassword.appendChild(spanPassword);
            divPasswordConfirm.appendChild(spanPasswordConfirm);

            labelPassword.textContent = "Contraseña";
            divPassword.insertBefore(inputPassword,spanPassword);
            labelPasswordConfirm.textContent = "Confirmar contraseña";
            divPasswordConfirm.insertBefore(inputPasswordConfirm,spanPasswordConfirm);
        }
        else{
            labelPassword.textContent = "";
            spanPassword.textContent = "";
            divPassword.removeChild(spanPassword);
            divPassword.removeChild(inputPassword);

            labelPasswordConfirm.textContent = "";
            spanPasswordConfirm.textContent = "";
            divPasswordConfirm.removeChild(inputPasswordConfirm);
            divPasswordConfirm.removeChild(spanPasswordConfirm);
        }
    }
});
