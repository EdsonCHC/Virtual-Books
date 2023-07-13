<?php
    function esconder(){
        if(!isset($_SESSION['user']) ){
            echo "esconder";
        }
    }

    function esconderV2(){
        if(isset($_SESSION['user'])){
            echo "esconder";
        }
    } 
?>