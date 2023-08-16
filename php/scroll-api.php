<?php
require_once('../php/cone.php');
$db = new DataBase();
$conn = $db->connect();

extract($_POST);// El valor anterior que deseas usar

// Ejecutar consulta almacenada usando PDO
$query = "CALL SeleccionarSiguientesDatos(?, ?)";
$stmt = $conn->prepare($query);
$stmt->bindParam(1, $valor_anterior, PDO::PARAM_INT);
$stmt->bindParam(2, $categoría, PDO::PARAM_STR);
$stmt->execute();

$json = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $json[] = array(
        "id" => $row["id"],
        "name" => $row["name"],
        "img" => $row["img"]
    );
}

$json_str = json_encode($json);
echo $json_str;


$conn = null;

?>