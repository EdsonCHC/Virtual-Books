$(function () {
  // función se ejecuta al principio
  $("#form").submit((e) => {
    e.preventDefault(); // detenemos el envío del form

    const name = $("#name").val();
    const lastName = $("#lastName").val();
    const email = $("#email").val();
    const password = $("#pass").val();
    const passConfirm = $("#passConfirm").val(); // Nueva variable para confirmación de contraseña

    // Validar que no se ingresen scripts en los campos
    if (containsScript(name) || containsScript(lastName) || containsScript(email) || containsScript(password) || containsScript(passConfirm)) {
      alertify.alert("No se permiten scripts en los campos.");
      return;
    }

    if (name.trim() === "" || lastName.trim() === "" || email.trim() === "" || password.trim() === "" || passConfirm.trim() === "") {
      alertify.alert("Por favor, completa todos los campos.");
      return; 
    }

    if (!/^[a-zA-ZáéíóúñÑ\s]+$/.test(name) || !/^[a-zA-ZáéíóúñÑ\s]+$/.test(lastName)) {
      alertify.alert("El nombre y el apellido no pueden contener números ni caracteres especiales.");
      return; 
    }

    if (password !== passConfirm) {
      alertify.error("Las contraseñas no coinciden");
    } else {
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
  });
});

function containsScript(text) {
  const scriptTags = /<script.*?>|<\/script>/gi;
  return scriptTags.test(text);
}
