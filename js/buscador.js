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
      $.post("../php/buscador.php", { search }, (response) => {
        if(response) {
          let data = JSON.parse(response);
          data.forEach((item) => {
            plantilla += `
              <tr>
                  <td class="result_td">${item.id}</td>
                  <td class="result_td">${item.name} </td>
                  <td class="result_td">${item.author} </td>
              </tr>
          `;
          });
          $("#search_results").show();
          $("#search_results").html(plantilla);
        }else{
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
    $.post("../php/buscador.php", { valor_anterior }, async (response) => {
      if (response){
        let data = await JSON.parse(response);
        let plantilla = "";
        data.forEach((book) => {
          plantilla += `
            <tr>
              <td>${book.id}</td>
              <td>${book.name} </td>
              <td>${book.author} </td>
          </tr>
                `;
          valor_anterior = book.id;
        });
        $("#table_content").append(plantilla);
      }
    });
  }
});


document.addEventListener("keyup", (e) => {
  if (e.target.matches("#buscarInp")) {
    document.querySelectorAll(".resource").forEach((name) => {
      const searchTerm = e.target.value.toLowerCase();
      const resourceContent = name.textContent.toLowerCase();
      const shouldShow = resourceContent.includes(searchTerm);

      name.classList.toggle("filtro", shouldShow);
      name.classList.toggle("filtro", !shouldShow);
    });
  }
});

/*Buscador de db*/
getData();

document.getElementById("buscarInp").addEventListener("keyup",getData)

function getData() {
  let inp = document.getElementById("buscarInp").value;
  let content = document.getElementById("resource");
  let url = "../php/buscador.php";
  let formData = new FormData();
  formData.append("buscarInp", inp);

  fetch(url, {
    method: "POST",
    body: formData,
  }).then(Response => Response.json())
  .then(data => {
    content.innerHTML = data
  }).catch(err => console.log(err));
}
