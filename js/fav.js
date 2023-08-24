$(function () {
  //Variables
  let table = document.getElementById("table");
  let valor_anterior = 0;

  //Pagina myBook.php
  get_books();

  //Visualiza el libro in myBooks
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

  //Pagina Book.php
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

  //Mostrar datos en Book
  showDataBook();

  function showDataBook() {
    $.post("../php/showResBook.php", { valor_anterior }, async (response) => {
      if (response) {
        let resource = JSON.parse(response);
        let template = "";
        resource.forEach((data) => {
          template += `
          <div id="container" ResIdBook="${data.id}">
            <div id="imgContainer">
                <img src="${data.img}" alt="book-image">
            </div>
            <div id="book-info">
              <div id="titleBook">
                <h3>${data.name}</h3>
              </div>
              <div id="authorBook">
                <h4>Autor</h4>
                <p>${data.author}</p>
              </div>
              <div id="typeBook">
                <h4>Tipo</h4>
                <p>${data.type}</p>
              </div>
              <div id="cateBook">
                <h4>Categoría</h4>
                <p>${data.category}</p>
              </div>
              <div id="descriptionBook">
                <h4>Descripcion</h4>
                <p>${data.description}</p>
              </div>
            </div>
            <div id="buttons">
              <div class="btnRead">
                <a href="../html/read.php?id="${data.id}" class="book-link ">
                  <i class="fa-sharp fa-solid fa-book-open-reader"></i>
                  <p data-section="book" data-value="leer">Leer</p>
                </a>
              </div>
              <div id="btnFav">
                <div id="addFav" class="book-link esconder();">
                  <i class="fa-solid fa-plus"></i>
                  <p data-section="book" data-value="fav">Favoritos</p>
                  <input type="hidden" value="${data.id}" id="input-id">
                </div>
                <div id="delFav" class="book-link esconder();">
                  <i class="fa-solid fa-trash" style="color: #141414;"></i>
                  <p data-section="book" data-value="fav">Favoritos</p>
                  <input type="hidden" value="${data.id}" id="input-id">
                </div>
              </div>
              <div class="btnDown">
                <a href="${data.src}" class="book-link down esconder();" download>
                  <i class="fa-solid fa-download"></i>
                  <p data-section="book" data-value="descargar">Descargar</p>
                </a>
              </div>
            </div>
          </div>
            `;
          valor_anterior = data.id;
        });
        $(".dataBook").append(template);
      }
    });
  }

  // Eliminar favoritos
  $(document).on("click", "#delFav", function () {
    alertify.comfirm("¿Eliminar De Favoritos?", function () {
      let btn = $(this)[0].parentElement.parentElement;
      let id = $(btn).attr("resId");
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

  // $("#delFav").on("click", () => {
  //   let id = $("#input-id").val();
  //   $.post("../php/delFav.php", { id }, (response) => {
  //     if (response) {
  //       alertify.success("Eliminado");
  //       delFav.style.display = "none";
  //       addFav.style.display = "flex";
  //     } else {
  //       alertify.error("Error");
  //     }
  //   });
  // });
  //Visualizar datos del formulario
  function fetchTasks() {
    //Ajax metodo "GET"
    $.ajax({
      url: "taskList.php",
      type: "GET",
      success: function (response) {
        let tasks = JSON.parse(response);
        let template = "";
        tasks.forEach((task) => {
          template += `
              <tr taskId="${task.id}">
                <td>${task.id}</td>
                <td>
                  <a href="#" class="task-item">${task.name}</a>
                </td>
                <td>${task.description}</td>
                <td>
                  <button class="task-delete btn btn-danger">
                    Delete
                  </button>
                </td>
              </tr>
            `;
        });
        $("#tasks").html(template);
      },
    });
  }
});