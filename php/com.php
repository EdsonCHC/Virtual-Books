<?php
require_once('../php/cone.php');
require_once('../php/methods.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    $id_recurso = $_POST['id_recurso'];
    $id_usuario = $_POST['user'];

    $texto = $_POST['text'];
    $valuation = $_POST['valuation'];

    try {
        $obj = new Comentario();
        $arr = array($texto, $valuation, $id_usuario, $id_recurso);
        $obj->insertData($arr);
        echo "success";
        echo "Ejecutando inserción...";
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
