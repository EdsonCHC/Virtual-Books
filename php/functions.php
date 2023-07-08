<?php
    function esconder(){//No se muestra si no hay sesión
        if(!isset($_SESSION['user']) ){
            echo "esconder";
        }
    }

    function esconderV2(){//No se muestra si hay sesión
        if(isset($_SESSION['user'])){
            echo "esconder";
        }
    } 
?>