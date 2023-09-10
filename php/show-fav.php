<?php
require_once('../php/cone.php');
require_once('../php/methods.php');
session_start();
$id_u = $_SESSION['user'][0];
$obj = new MétodosUser();
try {
    $sql = "SELECT r.id, r.name, r.img FROM shelf s LEFT JOIN resource r on s.id_r = r.id where s.id_u = $id_u";
    $stmt = $obj->showData($sql);

    if ($stmt->rowCount() > 0) {

        $json = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $json[] = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'img' => $row['img']
            );
        }
        $json_str = json_encode($json);
        echo $json_str;
        exit();
    } else {
        echo false;
        exit();
    }
} catch (PDOException $e) {
    die("Error " . $e->getMessage());
}
?>