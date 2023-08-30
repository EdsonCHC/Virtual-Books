<?php
require_once('../php/methods.php');
session_start();

extract($_POST);
try {
    $obj = new Comentario();
    $arr = array($texto, $valuation, $id_usuario, $id_recurso);
    $obj->insertData($arr);
    echo true;
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>