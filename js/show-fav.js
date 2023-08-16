$(function () {
  get_books();

  function get_books() {
    $.get("../php/show-fav.php", (response) => {
      let data = JSON.parse(response);
      let plantilla = "";
      data.forEach((datas) => {
        plantilla += `
            <a href="../html/book.php?id=${datas.id}">
                <img src="${datas.img}" alt="book-image">
            </a>
            `;
      });
      $("#book-container").html(plantilla);
    });
  }
});
