// Obtencion de datos
const form = document.getElementById("form");
const email = document.getElementById("email");
const pass = document.getElementById("password");
// const boton = document.getElementById("boton");

form.addEventListener("submit", e =>{
    e.preventDefault();
    let warnings = ""
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
    let regexPass = /^[A-Za-z\d]{8,}$/ 
    text.innerHTML = ""
    let entrar = false

    // Validación email
    if (!regexEmail.test(email.value)) {
        warnings += `El correo contiene caracteres inválidos`
        entrar = true
    }

    // Validación contraseña
    if (pass.value.length < 4) {
        warnings += `El nombre no es valido`
        entrar = true
    }
    if (!regexPass.test(pass.value)) {
        warnings += `La contraseña no es valida, solo puede contener letras y números`
        entrar = true
    }

    // Mensaje de alerta
    if (entrar) {
        text.innerHTML = warnings
    } else {
        text.innerHTML = "nice"
    }
})