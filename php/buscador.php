<?php
require_once('../php/cone.php');
$obj = new DataBase();
$DBH = $obj->connect();

$columns = ["id", 'name', 'img'];
$table = "resource";

$searchInput = isset($_POST['buscarInp']) ? $_POST['buscarInp'] : null;

$sql = "SELECT " . implode(",", $columns) . " FROM $table";

if ($searchInput !== null) {
    $sql .= " WHERE name LIKE :searchPattern OR category LIKE :searchPattern LIMIT 1";
    $searchPattern = "%$searchInput%";
    $stmt = $DBH->prepare($sql);
    $stmt->bindParam(":searchPattern", $searchPattern, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

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

echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>