$(function () {
  $("#form").submit((e) => {
    e.preventDefault();

    const post_data = {
      email: $("#email").val(),
      password: $("#password").val(),
    };
    $.post("../php/login_db_vb.php", post_data, (response) => {
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
  });
});
