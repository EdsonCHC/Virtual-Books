$(function () {
  //función se ejecuta al principio
  $("#form").submit((e) => {
    
    e.preventDefault(); //detenemos el envió del form
    if ($("#passConfirm").val() !== $("#pass").val()) {

      e.preventDefault();
      alertify.error("Las contraseñas no coinciden");

    } else {

      const formData = new FormData(); //nuevo objeto para contener datos key:value
      formData.append("name", $("#name").val());
      formData.append("lastName", $("#lastName").val());
      formData.append("email", $("#email").val());
      formData.append("password", $("#pass").val());

      let selected_file = $("#img_i")[0].files[0]; //input file
      let image = null;

      if (selected_file) {
        //validación input file
        image = selected_file.name;
        formData.append("file", selected_file);
        formData.append("img_name", image);
      } else {
        let icon = $("input[name='user-pic']:checked");
        if (icon.length > 0) {
          formData.append("img_name", icon.val());
        }
      }

      $.ajax({
        //método ajax de jquery
        url: "../php/register_db_vb.php", //url
        type: "POST", //method
        data: formData, //data
        processData: false,
        contentType: false,
        success: (response) => {
          //lo que se hará al obtener respuesta
          if (response === "true") {
            alertify.alert("Te has registrado", () => {
              window.location = "../html/login.php";
            });
          } else if (response === "false") {
            alertify.alert("El correo ya esta en uso");
          } else {
            alertify.alert("Ha ocurrido un error");
          }
        },
        error: (xhr, status, error) => {
          //manejo de error
          console.error(error);
        },
      });
    }
  });
});
