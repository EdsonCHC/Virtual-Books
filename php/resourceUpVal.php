<?php
require_once("../php/interface.php");
require_once("../php/cone.php");
require_once("../php/methods.php");
$obj = new MétodosAdmin();
extract($_POST);

if (isset($_FILES['file'])) {
    $file = $_FILES['file']['tmp_name'];
    $route = "../src/file/img" . $img_name;
    if ($oldImg !== "../src/file/img/") {
        unlink($oldImg);
        move_uploaded_file($file, $route);
    }
    try {
        $sql = "UPDATE resource SET name= ?,type=?, author= ?, category= ?, description= ?, src= ?, img= ? WHERE name = '$oldName'";
        $arr = array(
            $name,
            $autor,
            $tipo,
            $catergoria,
            $descripcion,
            $articulo,
            $route
        );
        if ($obj->updateData($sql, $arr)) {
            echo true;
        } else {
            echo false;
        }
    } catch (PDOException $e) {
        die("Error " . $e->getMessage());
    }
}
// // Recibir datos del formulario de actualización
// if (isset($_POST['name']) && isset($_POST['autor']) && isset($_POST['tipo']) && isset($_POST['cate']) && isset($_POST['desc'])) {
//     $id = $_POST['id']; // ID del recurso a actualizar
//     $name = $_POST['name'];
//     $autor = $_POST['autor'];
//     $tipo = $_POST['tipo'];
//     $cate = $_POST['cate'];
//     $desc = $_POST['desc'];

//     try {
//         // Consulta de actualización
//         $sql = "UPDATE resource SET name = :name, author = :autor, type = :tipo, category = :cate, description = :desc WHERE id = :id";

//         $arr = array(
//             ':name' => $name,
//             ':autor' => $autor,
//             ':tipo' => $tipo,
//             ':cate' => $cate,
//             ':desc' => $desc,
//             ':id' => $id
//         );

//         $stmt = $obj->updateData($sql, $arr);

//         // Ejecución de la consulta si prepareData() retorna true
//         if ($stmt === true) {
//             // Ejecutar la consulta
//             $updateResult = $obj->executeData($stmt); // Supongo que tienes un método executeData() para ejecutar la consulta

//             if ($updateResult !== false && $updateResult->rowCount() > 0) {
//                 echo "Actualización exitosa";
//             } else {
//                 echo "Error al actualizar";
//             }
//         }
//     } catch (PDOException $e) {
//         echo "Error: " . $e->getMessage();
//     }
// }
?>