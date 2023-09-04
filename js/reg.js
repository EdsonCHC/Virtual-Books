$(function () {
  $("#form").submit((e) => {
    e.preventDefault();
    let key = true;

    const name = $("#name").val();
    const lastName = $("#lastName").val();
    const email = $("#email").val();
    const password = $("#pass").val();
    const passConfirm = $("#passConfirm").val();

    //valores erróneos
    if (!/^[a-zA-ZáéíóúñÑ\s]+$/g.test(name)) {
      $("#warnName").html("El nombre solo puede contener letras");
      $("#name").css("border", "2px solid red");
      key = false;
    }

    if (!/^[a-zA-ZáéíóúñÑ\s]+$/g.test(lastName)) {
      $("#warnLName").html("El nombre solo puede contener letras");
      $("#lastName").css("border", "2px solid red");
      key = false;
    }

    if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g.test(email)) {
      $("#warnEmail").html("Ingrese un correo valido");
      $("#email").css("border", "2px solid red");
      key = false;
    }

    //contraseña
    if (password !== passConfirm) {
      alertify.error("Las contraseñas no coinciden");
      key = false;
    }

    //Eliminar estado de error
    $("#name").on("change", () => {
      $("#warnName").html("");
      $("#name").css("border", "none");
      key = true;
    });

    $("#lastName").on("change", () => {
      $("#warnLName").html("");
      $("#lastName").css("border", "none");
      key = true;
    });

    $("#email").on("change", () => {
      $("#warnEmail").html("");
      $("#email").css("border", "none");
      key = true;
    });

    if (key) {
      const formData = new FormData();
      formData.append("name", name);
      formData.append("lastName", lastName);
      formData.append("email", email);
      formData.append("password", password);

      let selected_file = $("#img_i")[0].files[0];
      let image = null;

      if (selected_file) {
        image = selected_file.name;
        formData.append("file", selected_file);
        formData.append("img_name", image);
      } else {
        let icon = $("input[name='user-pic']:checked");
        if (icon.length > 0) {
          formData.append("img_name", icon.val());
        }
      }
      post(formData);
    } else {
      e.preventDefault();
    }
  });
});

function post(formData) {
  $.ajax({
    url: "../php/register_db_vb.php",
    type: "POST",
    data: formData,
    processData: false,
    contentType: false,
    success: (response) => {
      if (response === "true") {
        alertify.alert("Te has registrado", () => {
          window.location = "../html/login.php";
        });
      } else if (response === "false") {
        alertify.alert("El correo ya está en uso");
      } else {
        alertify.alert("Ha ocurrido un error");
      }
    },
    error: (xhr, status, error) => {
      console.error(error);
    },
  });
}

// function containsScript(text) {
//   const scriptTags = /<script.*?>|<\/script>/gi;
//   return scriptTags.test(text);
// }
