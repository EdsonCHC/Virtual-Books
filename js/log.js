$(function () {
  $("#form").submit((e) => {
    e.preventDefault();
    let key = true;

    const email = $("#email").val();
    const password = $("#password").val();

    if (containsScript(email) || containsScript(password)) {
      alertify.alert("No se permiten scripts en los campos.");
      return;
    }

    //campos vacios
    if (email.trim() === "" || password.trim() === "") {
      alertify.alert("Por favor, completa todos los campos.");
      return;
    }

    //valores erroneos
    if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g.test(email)) {
      $("#warnEmail").html("Ingrese un correo valido");
      $("#email").css("border", "2px solid red");
      key = false;
    }

    //Eliminar estado de error
    $("#email").on("change", () => {
      $("#warnEmail").html("");
      $("#email").css("border", "2px solid blue");
      key = true;
    });

    if (key) {
      const formData = new FormData();
      formData.append("email", email);
      formData.append("password", password);

      post(formData);
    } else {
      e.preventDefault();
    }
  });
});

function post(formData) {
  $.ajax({
    url: "../php/login_db_vb.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: (response) => {
      let account = JSON.parse(response);
      switch (account.rol) {
        case "0":
          alertify.alert(`Bienvenido ${account.name}`, () => {
            window.location = "../html/index.php";
          });
          break;
        case "1":
          alertify.alert(`Bienvenido ${account.name}`, () => {
            window.location = "../html/admin.php";
          });
          break;
        default:
          alertify.alert("La datos ingresados son incorrectos");
          break;
      }
    },
    error: (xhr, status, error) => {
      console.error(error);
    },
  });
  //$.post("../php/login_db_vb.php", formData, (response) => {});
}

function containsScript(text) {
  const scriptTags = /<script.*?>|<\/script>/gi;
  return scriptTags.test(text);
}
