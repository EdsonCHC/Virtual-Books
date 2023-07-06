const text = document.getElementById("warning");
let ojo = document.getElementById("ojo");
let input = document.getElementById("input2");

//Funcion imagen
let vista_preliminar = (event) => {
  let vista = new FileReader();
  let id_img = document.querySelector("#img-preview");

  vista.onload = () => {
    if (vista.readyState == 2) {
      id_img.src = vista.result;
    }
  };
  vista.readAsDataURL(event.target.files[0]);
};

//Validar imagen
const validar = () => {
  let warnings = "";
  text.innerHTML = "";

  let archivo = document.getElementById("img_i").value,
    extension = archivo.substring(archivo.lastIndexOf("."), archivo.length);

  if (
    document
      .getElementById("img_i")
      .getAttribute("accept")
      .split(",")
      .indexOf(extension) < 0
  ) {
    warnings += "Archivo inválido. No se permite la extensión " + extension;
  }
  text.innerHTML = warnings;
};

//VEr contraseña
const eye = () => {
  if (input.type === "password") {
    input.type = "text";
    ojo.style.opacity = 0.2;
  } else {
    input.type = "password";
    ojo.style.opacity = 1;
  }
};
