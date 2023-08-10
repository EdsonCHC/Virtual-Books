<?php
require_once('../php/cone.php');
require_once('../php/methods.php');
$obj = new MétodosUser();


extract($_POST);

try {
    $sql = "SELECT password FROM user where email = '$email'";
    $stmt = $obj->showData($sql);
    $row = $stmt->fetch(\PDO::FETCH_ASSOC);
}catch (PDOException $e) {
    die("Error " . $e->getMessage());
}

if ($row['password'] === $password) {
    echo true;
    try{
        $sql = "DELETE FROM user WHERE email = '$email'";
        $obj->deleteData($sql);
        session_start();
        session_destroy();
    }catch (PDOException $e) {
        die("Error " . $e->getMessage());
    }
} else {
    echo false;
}

?>