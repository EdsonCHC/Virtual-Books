//validación de imagen
const text = document.getElementById("warning");
let ojo = document.getElementById("ojo");
let input = document.getElementById("passConfirm");
var key = true;

//ver imagen
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

//validar extensión 
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
    text.innerHTML = warnings;
    key = false;
  }else{
    key = true;
  }
};

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

    //campos vacíos
    if (
      $("#name").val() === "" ||
      $("#lastName").val() === "" ||
      $("#email").val() === ""
    ) {
      alertify.error("Complete todos los campos.");
      return;
    }

    //validaciones
    if (!/^[a-zA-ZáéíóúñÑ\s]+$/g.test($("#name").val())) {
      $("#warnName").html("El nombre solo puede contener letras");
      $("#name").css("border", "2px solid red");
      key = false;
    }

    if (!/^[a-zA-ZáéíóúñÑ\s]+$/g.test($("#lastName").val())) {
      $("#warnLName").html("El nombre solo puede contener letras");
      $("#lastName").css("border", "2px solid red");
      key = false;
    }

    if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g.test($("#email").val())) {
      $("#warnEmail").html("Ingrese un correo valido");
      $("#email").css("border", "2px solid red");
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

    let selected_file = $("#img_i")[0].files[0];
    let image = null;

    if (selected_file) {
      image = selected_file.name;
      formData.append("img", selected_file);
      formData.append("img_name", image);
    }

    if (key) {
      formData.append("name", $("#name").val());
      formData.append("lastName", $("#lastName").val());
      formData.append("lastEmail", $("#emailVal").val());
      formData.append("email", $("#email").val());
      formData.append("Pass", $("#oldPass").val());
      formData.append("oldImg", $("#imgData").val());
      post(formData);
    } else {
      e.preventDefault();
    }
  });
});

function post(formData) {
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
}
