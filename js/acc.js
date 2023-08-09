$(function() {

    $("#btnDelete").on("click", (e) => {
        alertify.confirm("Estas seguro de eliminar tu cuenta",
            function(){
                alertify.prompt("Ingresa tu contraseña para confirmar la acción", "",
                    function(evt, value){
                        let pass = value;
                        alertify.success(pass);
                    },
                    function(){
                        alertify.error("Cancelado");
                    }
                );
            },
            function(){

            }
        );
    });





});