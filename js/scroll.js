$(function () {
  let valor_anterior = 0;
  let isLoading = false;
  newData();

  $("#btn-cargar").on("click", () => {
    newData();
  });

  window.addEventListener("scroll", () => {
    const { scrollHeight, clientHeight, scrollTop } = document.documentElement;
    if (!isLoading && scrollTop + clientHeight > scrollHeight - 10) {
      isLoading = true; console.log(isLoading);
      setTimeout(() => {
        newData();
        isLoading = false; console.log(isLoading);
      }, 1000);
    }
  });

  function newData() {
    const post_data = {
      valor_anterior: valor_anterior,
      categoría: $("#cat-provider").val()
    }

    $.post("../php/scroll-api.php", post_data, async (response) => {
      let data = await JSON.parse(response);
      let plantilla = "";
      data.forEach((book) => {
        plantilla += `
            <a href="../html/book.php?id=${book.id}">
                <img src="${book.img}" alt="book-image">
            </a>
            `;
        valor_anterior = book.id;
      });
      $("#content").append(plantilla);
    });
  }
});
