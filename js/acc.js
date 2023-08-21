$(function () {
    $("#btnDelete").on("click", (e) => {
        alertify.confirm("Estas seguro de eliminar tu cuenta",
            function () {
                alertify.prompt("Ingresa tu contraseña para confirmar la acción", "",
                    function (evt, value) {
                        let pass = value.toString();
                        let email = $("#emailVal").val();
                        const pos_data = {
                            email: email,
                            password: pass
                        }
                        $.post("../php/accDelVal.php", pos_data, (response) => {
                            response ?
                                alertify.alert("Su cuenta ha sido eliminada", function () {
                                    window.location = "../html/index.php";
                                }) :
                                alertify.error("contraseña incorrecta");
                        });
                    },
                    function () {
                        alertify.error("Cancelado");
                    }
                );
            },
            function () {
                alertify.error("Cancelado");
            }
        );
    });

    $("#btn-update").on("click", (e) => {
        e.preventDefault();
        const formData = new FormData();
        formData.append("name", $("#name").val());
        formData.append("lastName", $("#lastName").val());
        formData.append("oldEmail", $("#emailVal").val());
        formData.append("email", $("#email").val());
        formData.append("oldPass", $("#oldPass").val());
        formData.append("newPass", $("#newPass").val());
        formData.append("oldImg", $("#imgData").val());

        let selected_file = $("#imagen")[0].files[0];
        let image = null;

        if (selected_file) {
            image = selected_file.name;
            formData.append("file", selected_file);
            formData.append("img_name", image);
        }


        $.ajax({
            //método ajax de jquery
            url: "../php/accUpVal.php", //url
            type: "POST", //method
            data: formData, //data
            processData: false,
            contentType: false,
            success: (response) => {
                if (response !== "bad-pass") {
                    alertify.success("Datos actualizados");
                    $("#updateDialog").hide();
                    $("#form-diag").trigger('reset');
                }else if (response === "bad-pass"){
                    alertify.error("Contraseña incorrecta");
                }else{
                    alertify.error("Ha ocurrido un error");
                }
            },
            error: (xhr, status, error) => {
                //manejo de error
                console.error(error);
            },
        });
    });
});