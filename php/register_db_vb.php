<?php

include_once('../php/conex.php');
include_once('../php/methods.php');

$obj = new métodosCrud();


if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));;
    
    // Se enlanzan los arrays
    $arr = array($name,$lastName,$email,$password,$img);

    $obj->insertData($arr);

    echo "<script>
            alert('Te registraste correctamente');
            window.location.href = '../html/login.php';
        </script>";
}
?>