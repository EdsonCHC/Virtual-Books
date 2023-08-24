$(function () {
  get_books();

  //Visualiza el libro
  function get_books() {
    $.get("../php/show-fav.php", (response) => {
      let resource = JSON.parse(response);
      let plantilla = "";
      resource.forEach((data) => {
        plantilla += `
          <div class="flex-books" resId="${data.id}">
          <a href="../html/book.php?id=${data.id}">
                <img src="${data.img}" alt="book-image">
                <p>${data.name}</p>
              </a>
          </div>
            `;
      });
      $("#resource").html(plantilla);
    });
  }

  var addFav = document.getElementById("addFav");
  var delFav = document.getElementById("delFav");

  // Añadir favoritos
  $("#addFav").on("click", () => {
    let id = $("#input-id").val();
    $.post("../php/addFav.php", { id }, (response) => {
      if (response) {
        alertify.success("Añadido Correctamente");
        addFav.style.display = "none";
        delFav.style.display = "flex";
      } else {
        alertify.error("Error");
      }
    });
  });

  // Eliminar favoritos
  //No esta capturando bien los datos
  $("#delFav").on("click", () => {
    let id = $("#input-id").val();
    $.post("../php/delFav.php", { id }, (response) => {
      if (response) {
        alertify.success("Eliminado");
        delFav.style.display = "none";
        addFav.style.display = "flex";
      } else {
        alertify.error("Error");
      }
    });
  });
});
