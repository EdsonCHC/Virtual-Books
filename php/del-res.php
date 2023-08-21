<?php
require_once("../php/methods.php");
$obj = new MétodosAdmin;

extract($_POST);

try {
    $sql = "DELETE FROM resource WHERE id = '$id'";
    echo $obj->deleteData($sql)? "1" : "2";   
    exit();
} catch (Exception $e) {
    echo false;
    die("Error: " . $e->getMessage());
}

?>