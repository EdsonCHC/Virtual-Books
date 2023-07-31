<?php

require_once('../php/cone.php');
require_once('../php/methods.php');

$obj = new MétodosUser();

if (isset($_POST['register'])) {
    extract($_POST); //extrae lo datos post y crea var con su contenido según el name
    $rol = "0";
    $sql = "SELECT email FROM user Where email = '$email'";
    $row = $obj->showData($sql);
    if ($row->rowCount() > 0) {
        echo "<script>
        alert('El correo ya esta en uso');
        window.location.href = '../html/register.php';
    </script>";
    } else {
        if ($nameImg = $_FILES['img']['name']) { // Si no ingresa imagen
            $rutaImg = $_FILES['img']['tmp_name'];
            $img = "../src/user/" . $nameImg;
            move_uploaded_file($rutaImg, $img);
            $arr = array($name, $lastName, $email, $password, $img, $rol);
            $obj->insertData($arr);
            echo "<script>
            alert('Te registraste correctamente');
            window.location.href = '../html/login.php';
            </script>";
        } else { //toma una de las que proporcionamos
            $img = $_POST['user-pic'];
            $arr = array($name, $lastName, $email, $password, $img, $rol);
            $obj->insertData($arr);
            echo "<script>
                alert('Te registraste correctamente');
                window.location.href = '../html/login.php';
            </script>";
        }

    }
}
?>