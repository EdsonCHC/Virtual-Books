// Datos de Nombre
let inputName = document.getElementById("input1");
let warningName = document.getElementById("warnings");

var elementName = document.createElement("div");
elementName.id = "notify";
elementName.style.display = "none";
warningName.appendChild(elementName);

inputName.addEventListener("invalid", function (event) {
  event.preventDefault();
  if (!event.target.validity.valid) {
    elementName.textContent =
      "El nombre no puede contener números";
    elementName.className = "error";
    elementName.style.display = "block";
    inputName.className = "invalid";
  }
});

inputName.addEventListener("input", function (event) {
  if ("block" === elementName.style.display) {
    inputName.className = "";
    elementName.style.display = "none";
  }
});


// Datos de Apellidos
let inputLastName = document.getElementById("input2");
let warningLastName = document.getElementById("warnings");

var elementLastName = document.createElement("div");
elementLastName.id = "notify";
elementLastName.style.display = "none";
warningLastName.appendChild(elementLastName);

inputLastName.addEventListener("invalid", function (event) {
  event.preventDefault();
  if (!event.target.validity.valid) {
    elementLastName.textContent =
      "Los apellidos no pueden contener números";
    elementLastName.className = "error";
    elementLastName.style.display = "block";
    inputLastName.className = "invalid";
  }
});

inputLastName.addEventListener("input", function (event) {
  if ("block" === elementLastName.style.display) {
    inputLastName.className = "";
    elementLastName.style.display = "none";
  }
});


// Datos de Contraseña
let inputPass = document.getElementById("input4");
let warningPass = document.getElementById("warnings");

var elementLastName = document.createElement("div");
elementLastName.id = "notify";
elementLastName.style.display = "none";
warningLastName.appendChild(elementLastName);

inputLastName.addEventListener("invalid", function (event) {
  event.preventDefault();
  if (!event.target.validity.valid) {
    elementLastName.textContent =
      "Los apellidos no pueden contener números";
    elementLastName.className = "error";
    elementLastName.style.display = "block";
    inputLastName.className = "invalid";
  }
});

inputLastName.addEventListener("input", function (event) {
  if ("block" === elementLastName.style.display) {
    inputLastName.className = "";
    elementLastName.style.display = "none";
  }
});