<?php
require_once("../php/methods.php");
$obj = new métodosAdmin();

extract($_POST);
if (isset($valor_anterior)) {
    $val = $valor_anterior;
    try {
        $sql = "SELECT id, name, author, type, category FROM resource where id > '$val' limit 8";
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


if(isset($id)) {
    try {
        $result = $obj->showData("SELECT * FROM resource WHERE id = $id");
        
        if (!$result){
            die("Error " . $con->errorInfo());
        }
        
        $json = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $json[] = array(
                "id" => $row['id'],
                "name" => $row['name'],
                "author" => $row['author'],
                "type" => $row['type'],
                "category" => $row['category'],
                "description" => $row['description'],
                "src" => $row['src'],
                "img" => $row['img']
            );
        }
        
        $json_str = json_encode($json[0]);
        echo $json_str;
    } catch (PDOException $e) {
        die("Error " . $e->getMessage());
    }
}


?>