$(function () {    
    let table = document.getElementById("table");
    let valor_anterior = 0;

    function showComentarios() {
        $.post("../php/show-com.php", { valor_anterior }, async (response) => {
            if (response === true) {
                let data = await JSON.parse(response);
                let plantilla = "";
                data.forEach((comentario) => {
                    plantilla += `
                        <tr>
                            <td>${comentario.id}</td>
                            <td>${comentario.description}</td>
                            <td>${comentario.valuation}</td>
                            <td comentario-id="${comentario.id}">
                                <div class="flex-element">
                                    <div class="actions">
                                        <button class="delete-item"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>`;
                    valor_anterior = comentario.id;
                });
                $("#table_content").append(plantilla);
            }
        });
    }

    $(document).on("click", ".delete-item", function () {
        let button = $(this).closest("td");
        let id = button.attr("comentario-id");
        alertify.confirm(
            "Estás seguro de eliminar este comentario",
            function () {
                $.post("../php/del-com.php", { id }, (response) => {
                    if (response) {
                        alertify.success("Comentario eliminado");
                    } else {
                        alertify.error("Error al eliminar el comentario");
                    }
                    showComentarios(); 
                });
            },
            function () {
                alertify.error("Cancelado");
            }
        );
    });

    showComentarios();
});
