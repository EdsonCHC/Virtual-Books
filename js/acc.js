$(function () {
  $("#btnDelete").on("click", (e) => {
    alertify.confirm(
      "Estas seguro de eliminar tu cuenta",
      function () {
        alertify.prompt(
          "Ingresa tu contraseña para confirmar la acción",
          "",
          function (evt, value) {
            let pass = value.toString();
            let email = $("#emailVal").val();
            const pos_data = {
              email: email,
              password: pass,
            };
            $.post("../php/accDelVal.php", pos_data, (response) => {
              response
                ? alertify.alert("Su cuenta ha sido eliminada", function () {
                    window.location = "../html/index.php";
                  })
                : alertify.error("contraseña incorrecta");
            });
          },
          function () {
            alertify.error("Cancelado");
          }
        );
      },
      function () {
        alertify.error("Cancelado");
      }
    );
  });

  $("#btnUpdate").on("click", (e) => {
    const oldEmail = $("#emailVal").val();
    $.post("../php/accUpVal.php", { oldEmail }, (response) => {
      let data = JSON.parse(response);
      let info = data[0];
      $("#name").val(info.name);
      $("#lastName").val(info.lastName);
      $("#email").val(info.email);
      $("#img-preview").attr("src", info.img);
    });
  });

  $("#btn-update").on("click", (e) => {
    e.preventDefault();
    const formData = new FormData();
    formData.append("name", $("#name").val());
    formData.append("lastName", $("#lastName").val());
    formData.append("lastEmail", $("#emailVal").val());
    formData.append("email", $("#email").val());
    formData.append("Pass", $("#oldPass").val());
    formData.append("oldImg", $("#imgData").val());

    let selected_file = $("#img_i")[0].files[0];
    let image = null;

    if (selected_file) {
      image = selected_file.name;
      formData.append("img", selected_file);
      formData.append("img_name", image);
    }

    $.ajax({
      //método ajax de jquery
      url: "../php/accUpVal.php", //url
      type: "POST", //method
      data: formData, //data
      processData: false,
      contentType: false,
      success: (response) => {
        switch (response) {
          case "1":
          case true:
            alertify.success("Datos actualizados");
            document.querySelector("#updateDialog").close();
            $("#form-diag").trigger("reset");
            break;
          case false:
            alertify.error("Ha ocurrido un error");
            break;
          case "bad-pass":
            alertify.error("Contraseña incorrecta");
            break;
        }
      },
      error: (xhr, status, error) => {
        //manejo de error
        console.error(error);
      },
    });
  });
});
