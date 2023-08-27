$(function () {
  //Variables
  let id = $("#input-id").val();
  let addFav = $("#addFav");
  let delFav = $("#delFav");

  // showDataBook();

  // //Mostrar datos en Book
  // function showDataBook() {
  //   $.post("../php/showResBook.php", { id }, (response) => {
  //     if (response) {
  //       let resource = JSON.parse(response);
  //       let template = "";
  //       resource.forEach((data) => {
  //         template += `
  //         <div id="container" ResIdBook="${data.id}">
  //           <div id="imgContainer">
  //               <img src="${data.img}" alt="book-image">
  //           </div>
  //           <div id="book-info">
  //             <div id="titleBook">
  //               <h3>${data.name}</h3>
  //             </div>
  //             <div id="authorBook">
  //               <h4>Autor</h4>
  //               <p>${data.author}</p>
  //             </div>
  //             <div id="typeBook">
  //               <h4>Tipo</h4>
  //               <p>${data.type}</p>
  //             </div>
  //             <div id="cateBook">
  //               <h4>Categoría</h4>
  //               <p>${data.category}</p>
  //             </div>
  //             <div id="descriptionBook">
  //               <h4>Descripción</h4>
  //               <p>${data.description}</p>
  //             </div>
  //           </div>
  //           <div id="buttons">
  //             <div class="btnRead">
  //               <a href="../html/read.php?id="${data.id}" class="book-link ">
  //                 <i class="fa-sharp fa-solid fa-book-open-reader"></i>
  //                 <p data-section="book" data-value="leer">Leer</p>
  //               </a>
  //             </div>
  //             <div id="btnFav">
  //               <div id="addFav" class="book-link inactive">
  //                 <i class="fa-solid fa-plus"></i>
  //                 <p data-section="book" data-value="fav">Favoritos</p>
  //               </div>
  //               <div id="delFav" class="book-link active">
  //                 <i class="fa-solid fa-trash"></i>
  //                 <p data-section="book" data-value="fav">Favoritos</p>
  //               </div>
  //             </div>
  //             <div class="btnDown">
  //               <a href="${data.src}" class="book-link down esconder();" download>
  //                 <i class="fa-solid fa-download"></i>
  //                 <p data-section="book" data-value="descargar">Descargar</p>
  //               </a>
  //             </div>
  //           </div>
  //         </div>
  //           `;
  //         valor_anterior = data.id;
  //       });
  //       $(".dataBook").append(template);
  //     }
  //   });
  // }

  //Añadir favoritos
  $(document).on("click", "#addFav", function () {
    let container = $(this).closest("#container");
    let id_add = container.data("id");
    let addFavBtn = container.find("#addFav");
    let delFavBtn = container.find("#delFav");
    $.post("../php/Fav.php", { id_add }, (response) => {
      if (response === "Added" || response === "Success") {
        console.log(response);
        alertify.success("Agregado a favoritos");
      } else if (response === "Error") {
        alertify.error("Error al agregar a favoritos");
      }
    });
  });

  // Eliminar favoritos
  $(document).on("click", "#delFav", function () {
    let container = $(this).closest("#container"); // Buscar el contenedor más cercano
    let id_del = container.data("id"); // Obtener el atributo ResIdBook
    let addFavBtn = container.find("#addFav");
    let delFavBtn = container.find("#delFav");
    $.post("../php/Fav.php", { id_del }, (response) => {
      if (response === "Removed") {
        alertify.success("Eliminado");
      } else {
        alertify.error("Error al eliminar");
      }
    });
  });
});
