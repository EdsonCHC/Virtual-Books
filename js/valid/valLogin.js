document.addEventListener("DOMContentLoaded", function () {
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const form = document.getElementById("form");
    const email = document.getElementById("email");
    const pass = document.getElementById("password");
    var text = document.getElementById("warnings");
    var text_2 = document.getElementById("warnings_2");

    let warnings = "";
    let warnings_2 = "";
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    let regexPass = /^[A-Za-z\d@$!%*?&]{4,}$/;
    let entrar = false;
    text.innerHTML = "";
    text_2.innerHTML = "";

    // Validación email
    if (!regexEmail.test(email.value)) {
      warnings += "El correo contiene caracteres inválidos <br>";
      entrar = true;
    }

    // Validación contraseña
    if (!regexPass.test(pass.value)) {
      warnings_2 += "La contraseña no es válida,<br> solo puede contener letras y números <br>";
      entrar = true;
    }

    // Mensaje de alerta
    if (entrar) {
      text.innerHTML = warnings;
      text_2.innerHTML = warnings_2;
    } else {
    }
    e.preventDefault();
  });
});
