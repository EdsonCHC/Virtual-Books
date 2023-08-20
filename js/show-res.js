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
                          <button><i class="fa-sharp fa-solid fa-trash"></i></button>
                      </div>
                  </div>
              </td>
            </tr>`;
          valor_anterior = book.id;
        });
        $("#table_content").append(plantilla);
      }

      /*update*/
      $(document).on("click", ".update-item", function (){
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
          console.log(input.img);
          $("#img-preview").attr("src", input.img);
          edit = true;
        });







        // const formData = new FormData();
        // formData.append("oldName", $("#name").val());
        // formData.append("autor", $("#autor").val());
        // formData.append("tipo", $("#tipo").val());
        // formData.append("categoría", $("#categoría").val());
        // formData.append("descripción", $("#descripción").val());
        // formData.append("articulo", $("#articulo").val());
        // formData.append("oldImg", $("#imagen").val());

        // // console.log(formData);
        // let selected_file = $("#imagen")[0].files[0];
        // let image = null;

        // if (selected_file) {
        //   image = selected_file.name;
        //   formData.append("file", selected_file);
        //   formData.append("img_name", image);
        // }

        // $.ajax({
        //   //método ajax de jquery
        //   url: "../php/resourceUpVal.php", //url
        //   type: "POST", //method
        //   data: formData, //data
        //   processData: true,
        //   contentType: true,
        //   success: (response) => {
        //     alertify.success("Datos actualizados");
        //     $("#dialogUp").hide();
        //     $("#form-diag-update").trigger("reset");
        //   },
        //   error: (xhr, status, error) => {
        //     //manejo de error
        //     console.error(error);
        //   },
        // });
      });
    });
  }
});
