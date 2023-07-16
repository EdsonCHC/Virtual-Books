// Obtencion de datos
const form = document.getElementById("form");
const name = document.getElementById("input1");
const lastName = document.getElementById("input2");
const email = document.getElementById("input3");
const text = document.getElementById("warnings");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  let warnings = "";
  let regexName = /^[a-zA-ZÁ-ÿ\s]{1,40}$/;
  let regexLastName = /^[a-zA-ZÁ-ÿ\s]{1,40}$/;
  let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
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

  // Mensajes de alerta
  if (entrar) {
    text.innerHTML = warnings;
  } else {
    text.innerHTML = "nice";
  }
});
