$(function () {
    //variables
    let table = document.getElementById("table");
    let valor_anterior = 0;
    let isLoading = false;
    let oldFileName = null;
    let oldImageName = null;
    let idFileUpdate = null;
    edit = false;
    
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