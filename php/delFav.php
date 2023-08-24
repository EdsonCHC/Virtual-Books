<?php
require_once('../php/cone.php');
require_once('../php/methods.php');
$obj = new MétodosUser();

extract($_POST);

try {
    $sql = "DELETE FROM shelf WHERE id = :id";
    $stmt = $obj->deleteData($sql)->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    exit();
} catch (PDOException $e) {
    die("Error " . $e->getMessage());
}
?>