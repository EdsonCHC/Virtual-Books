<?php
require_once('../php/cone.php');
require_once('../php/methods.php');
$obj = new MétodosUser();
try {
    $sql = "SELECT r.id, r.img FROM shelf s LEFT JOIN resource r on s.id_r = r.id";
    $stmt = $obj->showData($sql);

    if ($stmt->rowCount() > 0) {

        $json = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $json[] = array(
                'id' => $row['id'],
                'img' => $row['img']
            );
        }
        $json_str = json_encode($json);
        echo $json_str;
    } else {
        echo false;
    }
} catch (PDOException $e) {
    die("Error " . $e->getMessage());
}
?>