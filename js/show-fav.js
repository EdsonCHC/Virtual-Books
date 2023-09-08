$(function () {
  get_books();

  //Visualiza el libro
  function get_books() {
    $.get("../php/show-fav.php", (response) => {
      if (response) {
        let resource = JSON.parse(response);
        let plantilla = "";
        resource.forEach((data) => {
          plantilla += `
          <div class="container" resId="${data.id}">
            <div class="banner-image">
              <img src="${data.img}" alt="no funciona xd">
            </div>
            <div class="banner-text">
              <h3>${data.name}</h3>
            </div>
            <div class="button-wrapper">
              <a href="../html/book.php?id=${data.id}">
                <button class="btn fill">Acerca</button>
              </a>
            </div>
          </div>
              `;
        });
        $(".grid-books").html(plantilla);
      }
    });
  }

  //Elimina el libro
  $(document).on("click", ".res-delete", function () {
    if (confirm("Estas seguro de eliminar?")) {
      let element = $(this)[0].parentElement.parentElement;
      let id = $(element).attr("resId");
      //Se envía al backend para escuchar su respuesta
      $.post("taskDelete.php", { id }, function (response) {
        fetchTasks();
      });
    }
  });
});
