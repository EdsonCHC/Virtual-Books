<?php
require_once("../php/methods.php");
$obj = new MétodosAdmin;

extract($_POST);

try {
    if (isset($_FILES['file'])) {
        $file = $_FILES['file']['tmp_name'];
        $rutaSrc = "../src/files/" . $file_name;
        unlink($oldFile);
        move_uploaded_file($file, $rutaSrc);
    }

    if (isset($_FILES['img'])) {
        $img = $_FILES['img']['tmp_name'];
        $rutaImg = "../src/files/img/" . $img_name;
        unlink($oldImage);
        move_uploaded_file($img, $rutaImg);
    }

    try {
        $sql = "UPDATE resource SET name=?, author=?, type=?,
              category=?, description=?";

        $arr = array(
            $title,
            $author,
            $tipo,
            $categoría,
            $descripción,
        );

        if (isset($_FILES['file'])) {
            $sql .= ", src= ?";
            $arr[] = $rutaSrc;
        }

        if (isset($_FILES['img'])) {
            $sql .= ", img= ?";
            $arr[] = $rutaImg;
        }

        $sql .= " WHERE id = '$idFileUpdate'";

        if ($obj->updateData($sql, $arr)) {
            echo true;
        } else {
            echo false;
        }

    } catch (PDOException $e) {
        die("Error " . $e->getMessage());
    }
} catch (Exception $e) {
    echo false;
    die("Error: " . $e->getMessage());
}


?>