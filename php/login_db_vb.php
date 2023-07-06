<?php

//Poner la conexion real
include_once("../php/conexion.php");

if(isset($_POST['Send'])){

$conex = $conex_VB;
$email = $_POST['email'];
$contraseña = $_POST['contraseña'];     


if (isset($_POST['Send'])) {
    if (strlen($_POST['email']) >= 1 && strlen($_POST['contraseña']) >= 1) {

        $validar_login = mysqli_query($conex, "SELECT * FROM usuario WHERE Email='$email' and Contraseña='$contraseña'");
        if (mysqli_num_rows($validar_login) > 0) {
            // $data = $validar_login->fetch_assoc();
            session_start();
            echo "<script>
            alert('A iniciado sesión correctamente');
            window.location = '../html/index.php';
             </script>";
          exit;
        }
        else{
            echo '
            <script>
                alert("Datos incorrectos");
                window.location = "../html/login.php";

            </script>
            ';
            exit;
        }

    } else {
        echo '
        <script>
            alert("Aun hay campos sin llenar")
        </script>
        ';
    }
}
}
