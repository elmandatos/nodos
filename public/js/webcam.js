let capture;

function setup() {
    let canvas = createCanvas(320, 240);
    canvas.parent("canvasParent");
    background(0);
    capture = createCapture(VIDEO);
    capture.size(320, 240);
    capture.hide();
}

function draw() {
  image(capture, 0, 0, 320, 240);
}

let button = document.getElementById("capturar");
let img = document.getElementById("desplegar");
let foto = document.getElementById("foto");

button.addEventListener("click", function () {
    let canvas = document.getElementById("defaultCanvas0");
    let dataUrl = canvas.toDataURL("image/png");
    img.src = dataUrl;
    let cleanData = dataUrl.replace("data:image/png;base64,", "");
    cleanData = cleanData.replace(" ", "+");
    foto.value = cleanData;
    console.log(foto.value);
});
