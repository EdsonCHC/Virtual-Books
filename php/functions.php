<?php
    function esconder(){ // El LogOut se muestra si hay sesion activa
        if(!isset($_SESSION['user']) ){
            echo "esconder";
        }
    }

    function esconderV2(){ //El login y rester desactivados si hay sesion activa
        if(isset($_SESSION['user'])){
            echo "esconder";
        }
    } 
?>