<?php

require_once('../php/cone.php');
require_once('../php/methods.php');

$obj = new MétodosUser();

if (isset($_POST['register'])) {
    extract($_POST); //extrae lo datos post y crea var con su contenido segun el name
    $sql = "SELECT email FROM user Where email = '$email'";
    $row = $obj->showData($sql);
    if($row->rowCount() > 0){
        echo "<script>
        alert('El correo ya esta en uso');
        window.location.href = '../html/register.php';
    </script>";
    }else{
        $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        $rol = "0";
        $arr = array($name, $lastName, $email, $password, $img, $rol);
        $obj->insertData($arr);
    
        echo "<script>
            alert('Te registraste correctamente');
            window.location.href = '../html/login.php';
        </script>";
    }
}
?>