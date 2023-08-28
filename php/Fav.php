<?php
require_once('../php/cone.php');
require_once('../php/methods.php');
$obj = new DataBase();
$DBH = $obj->connect();

extract($_POST);

if (isset($id_add)) {
    try {
        $Query = "SELECT * FROM shelf WHERE id_r = $id_add";
        $checkStmt = $DBH->query($Query);
        $checkStmt->execute();
        $isAdded = $checkStmt->fetchColumn();

        if ($isAdded) {
            echo "added";
        } else {
            $insertQuery = "INSERT INTO shelf (id_r) VALUES (:id)";
            $insertStmt = $DBH->prepare($insertQuery);
            $insertStmt->bindParam(':id', $id_add, PDO::PARAM_INT);
            $insertStmt->execute();
            echo true;
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}


if (isset($id_del)) {
    try {
        $sql = "DELETE FROM shelf WHERE id_r = :id";
        $stmt = $DBH->prepare($sql);
        $stmt->bindParam(':id', $id_del,  PDO::PARAM_INT);
        echo $stmt->execute()? true: false;
        
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>