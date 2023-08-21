<?php
require_once("../php/methods.php");
$obj = new MétodosAdmin;

extract($_POST);

try {

    $src = $_FILES['file']['tmp_name'];
    $rutaSrc = "../src/files/" . $file_name;
    $img = $_FILES['img']['tmp_name'];
    $rutaImg = "../src/files/img/" . $img_name;

    unlink($oldFile);
    unlink($oldImage);

    $sql = "UPDATE resource SET name=?, author=?, type=?,
         category=?, description=?, src=?, img=? WHERE id = '$idFileUpdate'";

    $arr = array(
        $title,
        $author,
        $tipo,
        $categoría,
        $descripción,
        $rutaSrc,
        $rutaImg
    );

    move_uploaded_file($src, $rutaSrc);
    move_uploaded_file($img, $rutaImg);

    $obj->updateData($sql, $arr);
    echo true;

    exit();
} catch (Exception $e) {
    echo false;
    die("Error: " . $e->getMessage());
}


?>