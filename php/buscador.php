<?php
require_once("../php/interface.php");
require_once("../php/cone.php");
require_once("../php/methods.php");
$obj = new MétodosUser();

extract($_POST);
if (isset($valor_anterior)) {
    $id = $valor_anterior;
    try {
        $sql = "SELECT * FROM resource where id > '$id' limit 8";
        $row = $obj->showData($sql);

        if ($row->rowCount() > 0) {
            $json = array();
            while ($info = $row->fetch(PDO::FETCH_ASSOC)) {
                $json[] = array(
                    "id" => $info['id'],
                    "name" => $info['name'],
                    "author" => $info['author']
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
                    "author" => $info['author']
                );
            }
            $json_str = json_encode($json);
            echo ($json_str);
        } else {
            // no hace nada
            #2 + 2 = 5
        }
    } catch (PDOException $e) {
        die("Error " . $e->getMessage());
    }
}


// require_once('../php/cone.php');
// $obj = new DataBase();
// $DBH = $obj->connect();

//Mini validación
// $searchInput = isset($_POST['buscarInp']) ? $_POST['buscarInp'] : null;

// //Consulta
// $sql = "SELECT * FROM resource";

// if ($searchInput !== null) {
//     $sql .= " WHERE name LIKE :searchPattern AND category = 'Literatura' LIMIT 7"; #Solo buscaria para literatura
//     $searchPattern = "%$searchInput%";
//     $stmt = $DBH->prepare($sql);
//     $stmt->bindParam(":searchPattern", $searchPattern, PDO::PARAM_STR);
//     $stmt->execute();
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     //Busca los datos relacionados
//     $html = "";
//     if (isset($result) && count($result) > 0) {
//         foreach ($result as $info) {
//             $html .= '<div class="grid-books">';
//             $html .= '<li class="resource">';
//             $html .= '<a href="../html/book.php?id=' . $info["id"] . '">';
//             $html .= '<p>' . $info['name'] . '</p>';
//             $html .= '<img src="' . $info["img"] . '" alt="No funciona xd">';
//             $html .= '</a>';
//             $html .= '</li>';
//             $html .= '</div>';
//         }
//     } else {
//         $html .= '<div class="grid-books">';
//         $html .= '<li class="resource">';
//         $html .= '<p>Sin resultado</p>';
//         $html .= '</li>';
//         $html .= '</div>';
//     }
//     echo json_encode($html, JSON_UNESCAPED_UNICODE);
// }


?>