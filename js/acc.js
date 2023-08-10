$(function() {
    $("#btnDelete").on("click", (e) => {
        alertify.confirm("Estas seguro de eliminar tu cuenta",
            function(){
                alertify.prompt("Ingresa tu contraseña para confirmar la acción", "",
                    function(evt, value){
                        let pass = value.toString();
                        let email = $("#emailVal").val();
                        const pos_data = {
                            email: email,
                            password: pass
                        }
                        $.post("../php/accDelVal.php", pos_data, (response) => {
                            response? 
                            alertify.alert("Su cuenta ha sido eliminada", function(){
                                window.location = "../html/index.php";
                            }):
                            alertify.error("contraseña incorrecta");
                        });
                    },
                    function(){
                        alertify.error("Cancelado");
                    }
                );
            },
            function(){
                alertify.error("Cancelado");
            }
        );
    });
});