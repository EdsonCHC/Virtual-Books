<?php
require_once('../php/cone.php');
require_once('../php/methods.php');


$obj = new MétodosUser();

extract($_POST);

try {
    $sql = "SELECT id, name, author, type, category, description, src, img FROM resource where id = '$id'";
    $row = $obj->showData($sql);

    if ($row->rowCount() > 0) {
        $json = array();
        while ($info = $row->fetch(PDO::FETCH_ASSOC)) {
            $json[] = array(
                "id" => $info['id'],
                "name" => $info['name'],
                "author" => $info['author'],
                "type" => $info['type'],
                "category" => $info['category'],
                "description" => $info['description'],
                "src" => $info['src'],
                "img" => $info['img'],
            );
        }
        $json_str = json_encode($json);
        echo ($json_str);
    } else {
        echo "false";
    }
} catch (PDOException $e) {
    die("Error " . $e->getMessage());
}

?>