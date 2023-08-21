$(function () {
  //variables
  let table = document.getElementById("table");
  let valor_anterior = 0;
  let isLoading = false;
  let oldFileName = null;
  let oldImageName = null;
  let idFileUpdate = null;
  edit = false;

  showData();

  //modales
  $("#oP").on("click", () => {
    document.querySelector(".dialogIn").showModal();
  });

  $("#btnCancelIn").on("click", () => {
    document.querySelector(".dialogIn").close();
    $("#form-dialog-insert").trigger("reset");
    $("#img-preview").attr("src", "../src/img/icons8-book-100.png");
    edit = false;
  });

  //input
  $("#search_form").on("submit", (e) => {
    e.preventDefault();
  });

  //buscador
  $(".content_items_search").keyup((e) => {
    if ($(".content_items_search").val()) {
      let search = $(".content_items_search").val();
      let plantilla = "";
      $.post("../php/show-rec.php", { search }, (response) => {
        if (response) {
          let data = JSON.parse(response);
          data.forEach((item) => {
            plantilla += `
              <tr>
                  <td class="result_td">${item.id}</td>
                  <td class="result_td">${item.name} </td>
                  <td class="result_td">${item.author} </td>
                  <td class="result_td" book-id="${item.id}">
                      <div class="flex-element">
                          <div class="actions">
                              <button><i class="fa-solid fa-eye"></i></button>
                          </div>
                          <div class="actions">
                              <button><i class="fa-solid fa-book"></i></button>
                          </div>
                          <div class="actions">
                            <button class="update-item"><i class="fa-solid fa-file-pen"></i></button>
                          </div>
                          <div class="actions">
                            <button class="delete-item"><i class="fa-sharp fa-solid fa-trash"></i></button>
                          </div>
                      </div>
                  </td>
              </tr>
          `;
          });
          $("#search_results").show();
          $("#search_results").html(plantilla);
        } else {
          $("#search_results").hide();
        }
      });
    }
  });

  //scroll api
  table.addEventListener("scroll", () => {
    const { scrollHeight, clientHeight, scrollTop } = table;
    if (!isLoading && scrollTop + clientHeight > scrollHeight - 10) {
      isLoading = true;
      setTimeout(() => {
        showData();
        isLoading = false;
      }, 500);
    }
  });

  //insertar datos
  $("#form-dialog-insert").submit((e) => {
    e.preventDefault();

    const formData = new FormData();
    formData.append("title", $("#title").val());
    formData.append("author", $("#autor").val());
    formData.append("tipo", $("#tipo").val());
    formData.append("categoría", $("#categoría").val());
    formData.append("descripción", $("#descripción").val());

    let selected_image = $("#imagen")[0].files[0];
    let image = null;
    let selected_file = $("#articulo")[0].files[0];
    let file = null;

    if (selected_file && selected_image) {
      //file
      file = selected_file.name;
      formData.append("file", selected_file);
      formData.append("file_name", file);

      //imagen
      image = selected_image.name;
      formData.append("img", selected_image);
      formData.append("img_name", image);
    }

    if (
      oldFileName !== null &&
      oldImageName !== null &&
      idFileUpdate !== null
    ) {
      formData.append("oldFile", oldFileName);
      formData.append("oldImage", oldImageName);
      formData.append("idFileUpdate", idFileUpdate);
    }

    url = edit ? "../php/upd-res.php" : "../php/add-res.php";
    $.ajax({
      url: url,
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: (response) => {
        if (response) {
          alertify.success("Éxito");
          document.querySelector(".dialogIn").close();
          $("#form-dialog-insert").trigger("reset");
          edit = false;
          showData();
        } else {
          alertify.error("Error");
        }
      },
      error: (xhr, status, error) => {
        //manejo de error
        console.error(error);
      },
    });
  });

  //mostrar datos
  function showData() {
    $.post("../php/show-rec.php", { valor_anterior }, async (response) => {
      if (response) {
        let data = await JSON.parse(response);
        let plantilla = "";
        data.forEach((book) => {
          plantilla += `
            <tr>
              <td>${book.id}</td>
              <td>${book.name} </td>
              <td>${book.type} </td>
              <td>${book.author} </td>
              <td>${book.category}</td>
              <td book-id="${book.id}">
                  <div class="flex-element">
                      <div class="actions">
                          <button><i class="fa-solid fa-eye"></i></button>
                      </div>
                      <div class="actions">
                          <button><i class="fa-solid fa-book"></i></button>
                      </div>
                      <div class="actions">
                          <button class="update-item"><i class="fa-solid fa-file-pen"></i></button>
                      </div>
                      <div class="actions">
                          <button class="delete-item"><i class="fa-sharp fa-solid fa-trash"></i></button>
                      </div>
                  </div>
              </td>
            </tr>`;
          valor_anterior = book.id;
        });
        $("#table_content").append(plantilla);
      }
    });
  }

  //actualizar
  $(document).on("click", ".update-item", function () {
    document.querySelector(".dialogIn").showModal();
    let button = $(this)[0].parentElement.parentElement.parentElement;
    let id = $(button).attr("book-id");

    $.post("../php/show-rec.php", { id }, (response) => {
      const input = JSON.parse(response);
      $("#title").val(input.name);
      $("#autor").val(input.author);
      $("#tipo").val(input.type);
      $("#categoría").val(input.category);
      $("#descripción").val(input.description);
      $("#img-preview").attr("src", input.img);
      oldFileName = input.src;
      oldImageName = input.img;
      idFileUpdate = id;
      edit = true;
    });
  });

  //eliminar
  $(document).on("click", ".delete-item", function () {
    let button = $(this)[0].parentElement.parentElement.parentElement;
    let id = $(button).attr("book-id");
    alertify.confirm(
      "Estas seguro de eliminar este recurso",
      function () {
        $.post("../php/del-res.php", { id }, (response) => {
          console.log(response);
          if (response){
            alertify.success("Eliminado");
          }else{
            alertify.error("Error");
          }
          showData();
        });
      },
      function () {
        alertify.error("Cancelado");
      }
    );
  });
});
