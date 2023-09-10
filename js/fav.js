$(function () {
  //Variables
  let id = $("#input-id").val();

  //Añadir favoritos
  $(document).on("click", "#addFav", function () {
    let container = $(this).closest("#container");
    let id_add = container.data("id");
    let id_u = $("#id_u_input").val();
    const post_data = {
      "id_add": id_add,
      "id_u": id_u
    }
    $.post("../php/Fav.php", post_data, (response) => {
      console.log(response)
      switch (response) {
        case "1": 
        case true:
          alertify.success("Agregado a favoritos");
          $("#icon-fav").removeClass("fa-plus").addClass("fa-trash");
          break;
        case false:
          alertify.error("Error al agregar");
          break;
        case "added":
          alertify.error("ya esta en favoritos");
          break;
      }
    });
  });

  // Eliminar favoritos
  $(document).on("click", "#delFav", function () {
    let container = $(this).closest("#container"); // Buscar el contenedor más cercano
    let id_del = container.data("id"); // Obtener el atributo ResIdBook
    $.post("../php/Fav.php", { id_del }, (response) => {
      if (response) {
        alertify.success("Eliminado");
      } else {
        alertify.error("Error al eliminar");
      }
    });
  });
});
