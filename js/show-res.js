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
    });
  }
});
