<?php
require_once("../php/methods.php");
$obj = new Comentario();

extract($_POST);

if (isset($valor_anterior)) {
    $val = $valor_anterior;
    try {
        $sql = "SELECT id, description, valuation FROM comment WHERE id > '$val' LIMIT 8";
        $row = $obj->showData($sql);

        if ($row->rowCount() > 0) {
            $json = array();
            while ($info = $row->fetch(PDO::FETCH_ASSOC)) {
                $json[] = array(
                    "id" => $info['id'],
                    "description" => $info['description'],
                    "valuation" => $info['valuation']
                );
            }
            $json_str = json_encode($json);
            echo ($json_str);
        } else{
            echo false;
        }
    } catch (PDOException $e) {
        die("Error " . $e->getMessage());
    }
}


if (isset($id)) {
    try {
        $result = $obj->showData("SELECT * FROM WHERE WHERE id = $id");

        if (!$result) {
            die("Error " . $con->errorInfo());
        }

        $json = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $json[] = array(
                "name" => $row['name'],
                "description" => $row['description'],
                "valuation" => $row['valuation']
            );
        }

        $json_str = json_encode($json[0]);
        echo $json_str;
    } catch (PDOException $e) {
        die("Error " . $e->getMessage());
    }
}
?>

