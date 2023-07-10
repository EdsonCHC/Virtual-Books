// Obtencion de datos
const form = document.getElementById("form");
const name = document.getElementById("input1");
const lastName = document.getElementById("input2");
const email = document.getElementById("input3");
const pass = document.getElementById("input4");
const passConfirm = document.getElementById("inputP");
const text = document.getElementById("warnings");
// const boton = document.getElementById("boton");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  let warnings = "";
  let regexName = /^[a-zA-ZÁ-ÿ\s]{1,40}$/;
  let regexLastName = /^[a-zA-ZÁ-ÿ\s]{1,40}$/;
  let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
  let regexPass = /^[A-Za-z\d]{8,}$/;
  let regexPassConfirm = /^[A-Za-z\d]{8,}$/;
  text.innerHTML = "";
  let entrar = false;

  // Validadión nombre
  if (name.value.length < 4) {
    warnings += `El nombre no es valido`;
    entrar = true;
  }
  if (!regexName.test(name.value)) {
    warnings += `El nombre no es valido`;
    entrar = true;
  }

  // Validadión apellido
  if (lastName.value.length < 4) {
    warnings += `El apellido no es valido`;
    entrar = true;
  }
  if (!regexLastName.test(lastName.value)) {
    warnings += `El apellido no es valido`;
    entrar = true;
  }

  // Validación email
  if (!regexEmail.test(email.value)) {
    warnings += `El correo contiene caracteres inválidos`;
    entrar = true;
  }

  // Validación contraseña
  if (pass.value.length < 4) {
    warnings += `El nombre no es valido`;
    entrar = true;
  }
  if (!regexPass.test(pass.value)) {
    warnings += `La contraseña no es valida, solo puede contener letras y números`;
    entrar = true;
  }

  if (passConfirm.value.length < 4) {
    warnings += `El nombre no es valido`;
    entrar = true;
  }
  if (!regexPassConfirm.test(passConfirm.value)) {
    warnings += `La contraseña no es valida, solo puede contener letras y números`;
    entrar = true;
  }

  // Mensajes de alerta
  if (entrar) {
    text.innerHTML = warnings;
  } else {
    text.innerHTML = "nice";
  }
});
