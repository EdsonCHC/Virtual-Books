<?php
require_once("../php/methods.php");
$obj = new métodosAdmin();
extract($_POST);

try {
    $src = $_FILES['file']['tmp_name'];
    $rutaSrc = "../src/files/" . $file_name;
    $img = $_FILES['img']['tmp_name'];
    $rutaImg = "../src/files/img/" . $img_name;

    $arr = array(
        $title,
        $author,
        $tipo,
        $categoría,
        $descripción,
        $rutaSrc,
        $rutaImg
    );
    if (move_uploaded_file($src, $rutaSrc) && move_uploaded_file($img, $rutaImg)) {
        $obj->insertData($arr);
        echo true;
        exit;
    }

} catch (Exception $e) {
    echo false;
    die("Error: " . $e->getMessage());
}

?>