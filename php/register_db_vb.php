<?php

require_once('../php/cone.php');
require_once('../php/methods.php');

$obj = new MétodosUser();


if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $img = addslashes(file_get_contents($_FILES['img']['tmp_name']));
    $rol = "0";
    $arr = array($name,$lastName,$email,$password,$img,$rol);

    $obj->insertData($arr);

    echo "<script>
            alert('Te registraste correctamente');
            window.location.href = '../html/login.php';
        </script>";
}
?>