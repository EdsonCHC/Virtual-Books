<?php
/*Mimi contexto
La cosa funciona, pero solo funciona para solo una categoria porque si la dejo sin categoria va a meter
articulos en categorias que no debe, y para validar que ponga los articulos segun la categoria no lo se por el momento
*/
require_once('../php/cone.php');
$obj = new DataBase();
$DBH = $obj->connect();

//Mini validación
$searchInput = isset($_POST['buscarInp']) ? $_POST['buscarInp'] : null;

//Consulta
$sql = "SELECT * FROM resource";

if ($searchInput !== null) {
    $sql .= " WHERE name LIKE :searchPattern AND category = 'Literatura' LIMIT 7"; #Solo buscaria para literatura
    $searchPattern = "%$searchInput%";
    $stmt = $DBH->prepare($sql);
    $stmt->bindParam(":searchPattern", $searchPattern, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //Busca los datos relacionados
    $html = "";
    if (isset($result) && count($result) > 0) {
        foreach ($result as $info) {
            $html .= '<div class="grid-books">';
            $html .= '<li class="resource">';
            $html .= '<a href="../html/book.php?id=' . $info["id"] . '">';
            $html .= '<p>' . $info['name'] . '</p>';
            $html .= '<img src="' . $info["img"] . '" alt="No funciona xd">';
            $html .= '</a>';
            $html .= '</li>';
            $html .= '</div>';
        }
    } else {
        $html .= '<div class="grid-books">';
        $html .= '<li class="resource">';
        $html .= '<p>Sin resultado</p>';
        $html .= '</li>';
        $html .= '</div>';
    }

}


echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>