let radioTypeUser = document.querySelectorAll(".radioTypeUser");

init();

function init() {
  radioAction();
}

function radioAction() {
  radioTypeUser.forEach((button) => {
    button.addEventListener("click",() => {
      checkValue(button.value);
    });
  });
}

function checkValue(value) {
  if(value=="administrador" || value=="asistente") {
    removeElement("rowPass");
    addElement("parentPass", "<td><label for='password'>Contraseña:</label></td><td><input type='password' name='password' id='password'></td>");
  } else {
    removeElement("parentPass");

  }
}

function addElement(parentId, html) {
  let element = document.getElementById(parentId);
  element.innerHTML = html;
}

function removeElement(elementID) {
  let element = document.getElementById(elementID);
  if(element !== null){
    element.innerHTML = "";
  }

}
