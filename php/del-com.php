<?php
require_once("../php/methods.php");
$obj = new Comentario;
extract($_POST);
try {
    $sql = "DELETE FROM comment WHERE id = :id";
    echo $obj->deleteData($sql, $id)? "1" : "2";   
    exit();
} catch (Exception $e) {
    echo false;
    die("Error: " . $e->getMessage());
}
?>