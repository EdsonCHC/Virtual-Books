<?php
require_once("../php/interface.php");
require_once("../php/cone.php");
require_once("../php/methods.php");
$obj = new métodosAdmin();

extract($_POST);
if (isset($valor_anterior)) {
    $id = $valor_anterior;
    try {
        $sql = "SELECT id, name, author, type, category FROM resource where id > '$id' limit 8";
        $row = $obj->showData($sql);

        if ($row->rowCount() > 0) {
            $json = array();
            while ($info = $row->fetch(PDO::FETCH_ASSOC)) {
                $json[] = array(
                    "id" => $info['id'],
                    "name" => $info['name'],
                    "author" => $info['author'],
                    "type" => $info['type'],
                    "category" => $info['category']
                );
            }
            $json_str = json_encode($json);
            echo ($json_str);
        } else {
            echo false;
        }
    } catch (PDOException $e) {
        die("Error " . $e->getMessage());
    }
}

if (isset($search)) {
    try {
        $sql = "SELECT * FROM resource where name like '%$search' or author like '%$search'";
        $row = $obj->showData($sql);

        if ($row->rowCount() > 0) {
            $json = array();
            while ($info = $row->fetch(PDO::FETCH_ASSOC)) {
                $json[] = array(
                    "id" => $info['id'],
                    "name" => $info['name'],
                    "author" => $info['author'],
                    "type" => $info['type'],
                    "category" => $info['category']
                );
            }
            $json_str = json_encode($json);
            echo ($json_str);
        } else {
            // no hace nada
        }
    } catch (PDOException $e) {
        die("Error " . $e->getMessage());
    }
}


?>