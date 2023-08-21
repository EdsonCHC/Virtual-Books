$(function () {
  get_books();

  //Visualiza el libro
  function get_books() {
    $.get("../php/showResAdmin.php", (response) => {
      let resource = JSON.parse(response);
      let plantilla = "";
      resource.forEach((data) => {
        plantilla += `
          <div class="flex-books" resId="${data.id}">
            <img src="${data.img}" alt="book-image">
            <p>${data.name}</p>
          </div>
            `;
      });
      $("#resource").html(plantilla);
    });
  }
});
