$(function (){

    $("#add-fav").on("click", ()=>{
        let id = $("#input-id").val();  

        $.post("../php/add-fav.php", {id} , (response) =>{
            console.log(response);
        });
    });
});