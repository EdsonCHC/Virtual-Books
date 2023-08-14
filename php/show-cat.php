<?php
require_once('../php/cone.php');
require_once('../php/methods.php');
$obj = new MétodosUser();

try {
    $sql = "SELECT * FROM resource";
    $stmt = $obj->showData($sql);

    if ($stmt->rowCount() > 0) {

        $json = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $json[] = array(
                'id' => $row['id'],
                'name' => $row['name'],
                'type' => $row['type'],
                'author' => $row['author'],
                'category' => $row['category']
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