<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "vb";
$conex = new mysqli($servername, $username, $password, $database);
extract($_POST);


if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE from shelf where id= $id";
    $result = mysqli_query($conex,$sql); 
    if (!$result) {
        die("Query Failed.");
    }
    echo "tarea eliminada";
}

?>