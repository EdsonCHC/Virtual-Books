<?php
    function esconder(){ // Esconde si no hay sesión
        if(!isset($_SESSION['user']) ){
            echo "esconder";
        }
    }

    function esconderV2(){ //Esconde si hay sesión
        if(isset($_SESSION['user'])){
            echo "esconder";
        }
    } 

?>