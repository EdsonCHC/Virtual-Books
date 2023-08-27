$(function () {
    get_books();
  
    //Visualiza el libro
    function get_books() {
      $.get("../php/show-fav.php", (response) => {
        if(response){
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