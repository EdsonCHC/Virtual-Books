<?php
require_once('../php/cone.php');
require_once('../php/interface.php');
require_once('../php/methods.php');
$obj = new MétodosUser;

extract($_POST); // El valor anterior que deseas usar

try {
    if(isset($valor_anterior)){
        $query = "SELECT * FROM resource WHERE id > $valor_anterior AND category = '$categoría' ORDER BY id ASC LIMIT 5";
        $stmt = $obj->showData($query);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            $json = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $json[] = array(
                    "id" => $row["id"],
                    "name" => $row["name"],
                    "img" => $row["img"]
                );
            }
            $json_str = json_encode($json);
            echo $json_str;
            $conn = null;
        }else{
            echo false;
        }
    }
} catch (PDOException $e) {
    die("Error : " . $e->getMessage());
}

?>