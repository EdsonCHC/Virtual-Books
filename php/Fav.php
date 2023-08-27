<?php
require_once('../php/cone.php');
require_once('../php/methods.php');
$obj = new DataBase();
$DBH = $obj->connect();

extract($_POST);
if (isset($id_add)) {
    try {
        $checkQuery = "SELECT * FROM shelf WHERE id_r = :id";
        $checkStmt = $DBH->prepare($checkQuery);
        $checkStmt->bindParam(':id', $id_add, PDO::PARAM_INT);
        $checkStmt->execute();
        $isAdded = $checkStmt->fetchColumn();

        if ($isAdded) {
            echo "Added";
        } else {
            $insertQuery = "INSERT INTO shelf (id_r) VALUES (:id)";
            $insertStmt = $DBH->prepare($insertQuery);
            $insertStmt->bindParam(':id', $id_add, PDO::PARAM_INT);
            $insertStmt->execute();
            echo "Success";
        }
    } catch (PDOException $e) {
        echo "Error";
    }
}


if (isset($id_del)) {
    try {
        $sql = "DELETE FROM shelf WHERE id_r = :id";
        $stmt = $DBH->prepare($sql);
        $stmt->bindParam(':id', $id_del, PDO::PARAM_INT);
        $stmt->execute();
        echo "Removed";

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>