<?php


try {

    $src = $_FILES['file']['tmp_name'];
    $rutaSrc = "../src/files/" . $file_name;
    $img = $_FILES['img']['tmp_name'];
    $rutaImg = "../src/files/img/" . $img_name;

    unlink($oldFile);
    unlink($oldImg);


    $sql = "UPDATE resource SET name=?, author=?, type=?,
         category=?, description=?, src=?, img=? WHERE id = '$id'";

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

    $obj->updateData($sql, $arr);
} catch (Exception $e) {
    echo false;
    die("Error: " . $e->getMessage());
}


?>