$(function () {
  $("#form").submit((e) => {
    e.preventDefault();
    let key = true;

    const email = $("#email").val();
    const password = $("#password").val();
  
    if (email.trim() === "" || password.trim() === "") {
      alertify.alert("Por favor, completa todos los campos.");
      return;
    }

    if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g.test(email)) {
      $("#warnEmail").html("Ingrese un correo valido");
      $("#email").css("border", "2px solid red");
      key = false;
    }

    //Eliminar estado de error
    $("#email").on("change", () => {
      $("#warnEmail").html("");
      $("#email").css("border", "1px solid #ccc");
      key = true;
    });

    if (key) {
      const formData = {
        "email": email,
        "password": password
      };
      post(formData);
    } else {
      e.preventDefault();
    }
  });
});

function post(formData) {
  $.post("../php/login_db_vb.php", formData, (response) => {
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
  });
}

