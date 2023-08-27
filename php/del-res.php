<?php
require_once("../php/methods.php");
$obj = new MétodosAdmin;

extract($_POST);
try {
    $query = "SELECT src, img FROM resource WHERE id = '$id'";
    $result = $obj->showData($query);
    $un_link = $result->fetch(PDO::FETCH_ASSOC);
    unlink($un_link['img']);
    unlink($un_link['src']);
    
    $sql = "DELETE FROM resource WHERE id = :id";
    echo $obj->deleteData($sql, $id)? true: false;   
    exit();
} catch (Exception $e) {
    echo false;
    die("Error: " . $e->getMessage());
}

?>