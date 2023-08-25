<?php
require_once('../php/cone.php');
require_once('../php/methods.php');
$obj = new DataBase();
$DBH = $obj->connect();

extract($_POST);
if (isset($id_add)) {

    try {
        $stmt = $DBH->prepare("INSERT INTO shelf(`id_r`) VALUES ($id)");
        $stmt->execute();
        if ($stmt) {
            echo true;
        } else {
            echo false;
        }
    } catch (PDOException $e) {
        die("Error " . $e->getMessage());
    }

}

if(isset($id_del)){
    try {
        $sql = "DELETE FROM shelf WHERE id = :id";
        $stmt = $DBH->query($sql);
        $stmt->bindParam(':id', $id_del, PDO::PARAM_INT);
        $stmt->execute();
        exit();
    } catch (PDOException $e) {
        die("Error " . $e->getMessage());
    }
}
?>