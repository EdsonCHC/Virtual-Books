<?php
require_once('../php/cone.php');
require_once('../php/methods.php');
$obj = new MétodosAdmin();
try {
    $sql = "SELECT id, name, img FROM resource where id = '$id'";
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