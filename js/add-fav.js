$(function (){

    $("#add-fav").on("click", ()=>{
        let id = $("#input-id").val();  

        $.post("../php/add-fav.php", {id} , (response) =>{
            response? 
            alertify.success("Se ha añadido"):
            alertify.error("Error");
        });
    }); 
});