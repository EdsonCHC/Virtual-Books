$(function () {
  let table = document.getElementById("table");
  let valor_anterior = 0;
  let isLoading = false;
  showData();

  $("#search_form").on("submit", (e) => {
    e.preventDefault();
  });

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
                  <td class="result_td">
                      <div class="flex-element">
                          <div class="actions">
                              <button><i class="fa-solid fa-eye"></i></button>
                          </div>
                          <div class="actions">
                              <button><i class="fa-solid fa-book"></i></button>
                          </div>
                          <div class="actions">
                            <button id="btnUpdate"><i class="fa-solid fa-file-pen"></i></button>
                          </div>
                          <div class="actions">
                            <button><i class="fa-sharp fa-solid fa-trash"></i></button>
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
              <td>
                  <div class="flex-element">
                      <div class="actions">
                          <button><i class="fa-solid fa-eye"></i></button>
                      </div>
                      <div class="actions">
                          <button><i class="fa-solid fa-book"></i></button>
                      </div>
                      <div class="actions">
                          <button id="btnUpdate"><i class="fa-solid fa-file-pen"></i></button>
                          <dialog class="dialogUp">
                            <form method="POST" enctype="multipart/form-data" id="form-dialog-update">
                                <h4 data-section="catalogo" data-value="agregar">Actualiza tus Recursos</h4>
                                <hr>
                                <div class="content_form">
                                    <label for="title" class="form_text" data-section="catalogo" data-value="titulo">Titulo</label>
                                    <input type="text" id="title" class="inputs" name="name" autocomplete="off">
                                </div>
                                <div class="content_form">
                                    <label for="autor" class="form_text" data-section="catalogo" data-value="autor">Autor</label>
                                    <input type="text" id="autor" class="inputs" name="autor" autocomplete="off">
                                </div>
                                <div class="content_form">
                                    <label for="tipo" class="form_text" data-section="catalogo" data-value="tipoR">Tipo de recurso</label>
                                      <select id="tipo" class="recurso" name="tipo">
                                        <option value="" selected disabled data-section="catalogo" data-value="tipo">Tipo</option>
                                        <option value="Revista" data-section="catalogo" data-value="revista">Revista Académica</option>
                                        <option value="Libro" data-section="catalogo" data-value="libro">Libro</option>
                                        <option value="Tesis" data-section="catalogo" data-value="tesis">Tesis</option>
                                      </select>
                                </div>
                                <div class="content_form">
                                  <label for="tipo" class="form_text" data-section="catalogo" data-value="cate">Categoría</label>
                                  <select id="categoría" name="cate">
                                    <option value="" selected disabled data-section="catalogo" data-value="cate">Categoría</option>
                                    <option value="Ciencia" data-section="catalogo" data-value="ciencia">Ciencia</option>
                                    <option value="Literatura" data-section="catalogo" data-value="literatura">Literatura</option>
                                    <option value="Física" data-section="catalogo" data-value="fisica">Física</option>
                                    <option value="Economía" data-section="catalogo" data-value="economia">Economía</option>
                                    <option value="Historia" data-section="catalogo" data-value="historia">Historia</option>
                                </select>
                                </div>
                                <div class="content_form">
                                    <label for="descripción" class="form_text" data-section="catalogo"
                                        data-value="desc">Descripción</label>
                                    <textarea id="descripción" class="descripción" name="desc"></textarea>
                                </div>
                                <div class="content_form">
                                    <label for="articulo" class="src" data-section="catalogo" data-value="art">Articulo</label>
                                    <input type="file" id="articulo" accept=".pdf" name="src" autocomplete="off">
                                </div>
                                <div class="content_form">
                                    <label for="imagen" class="src" data-section="catalogo" data-value="img">Imagen</label>
                                    <input type="file" id="imagen" accept="Image/*" name="img"
                                        onchange="vista_preliminar(event), validar()">
                                    <div id="img-container"><img class="grande" src="../src/img/icons8-book-100.png" alt="user_image"
                                            id="img-preview">
                                    </div>
                                </div>
                                <div class="btnPart">
                                  <button type="submit" id="btnUp" name="btnUP" data-section="catalogo" data-value="añadir">Actualizar</button>
                                  <button type="button" id="btnCancelUp" data-section="catalogo"
                                      data-value="cancelar">Cancelar</button>
                                </div>
                            </form>          
                          </dialog>
                      </div>
                      <div class="actions">
                          <button><i class="fa-sharp fa-solid fa-trash"></i></button>
                      </div>
                  </div>
              </td>
          </tr>
                `;
          valor_anterior = book.id;
        });
        $("#table_content").append(plantilla);
      }
      /*Formularios modales*/
      document.querySelector("#btnUpdate").addEventListener("click", () => {
        document.querySelector(".dialogUp").showModal();
      });
      document.querySelector("#btnCancelUp").addEventListener("click", () => {
        document.querySelector(".dialogUp").close();
        $("#form-dialog-update").trigger("reset");
      });
      /*Funcion de update*/
      document.querySelector("#btnUp").on("click", (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append("oldName", $("#name").val());
        formData.append("autor", $("#autor").val());
        formData.append("tipo", $("#tipo").val());
        formData.append("categoria", $("#categoria").val());
        formData.append("descripcion", $("#descripción").val());
        formData.append("articulo", $("#articulo").val());
        formData.append("oldImg", $("#imagen").val());

        // console.log(formData);
        let selected_file = $("#imagen")[0].files[0];
        let image = null;

        if (selected_file) {
          image = selected_file.name;
          formData.append("file", selected_file);
          formData.append("img_name", image);
        }

        $.ajax({
          //método ajax de jquery
          url: "../php/resourceUpVal.php", //url
          type: "POST", //method
          data: formData, //data
          processData: true,
          contentType: true,
          success: (response) => {
            alertify.success("Datos actualizados");
            $("#dialogUp").hide();
            $("#form-diag-update").trigger("reset");
          },
          error: (xhr, status, error) => {
            //manejo de error
            console.error(error);
          },
        });
      });
    });
  }
});
