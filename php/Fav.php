<?php
require_once('../php/cone.php');
require_once('../php/methods.php');
$obj = new DataBase();
$DBH = $obj->connect();

extract($_POST);
if (isset($id_add)) {
    try {
        $sql = "INSERT INTO shelf (id_r) VALUES (:id)";
        $stmt = $DBH->prepare($sql);
        $stmt->bindParam(':id', $id_add, PDO::PARAM_INT);
        $stmt->execute();
        echo "Success";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if (isset($id_del)) {
    try {
        $sql = "DELETE FROM shelf WHERE id_r = :id";
        $stmt = $DBH->prepare($sql);
        $stmt->bindParam(':id', $id_del, PDO::PARAM_INT);
        $stmt->execute();
        echo "Success";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>