<?php

require_once('../php/cone.php');
require_once('../php/methods.php');
$obj = new MétodosUser();


extract($_POST);
$rol = "0";
date_default_timezone_set('America/El_Salvador');
$time = date("Y-m-d H:i:s");
$sql = "SELECT email FROM user Where email = '$email'";
$row = $obj->showData($sql);
if ($row->rowCount() > 0) {
    echo "false";
    exit();
} else {
    $route = "../src/user/" . $img_name;
    if(isset($_FILES['file'])){
       $file = $_FILES['file']['tmp_name'];
       move_uploaded_file($file, $route);
    }
    try{
        $arr = array($name, $lastName, $email, $password, $route, $rol, $time);
        $obj->insertData($arr);
        echo "true";
    }catch(PDOException $e){
        echo "Error ". $e->getMessage(); 
    }
    }
    exit();
?>