<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "vb";
$conex = new mysqli($servername, $username, $password, $database);

extract($_POST);
$search = $_POST['search'];

if (!empty($search)) {
    $sql = "SELECT * from resource where name like '%$search%'";
    $result = mysqli_query($conex, $sql);
    if (!$result) {
        die('Query Error' . mysqli_error($conex));
    }
    $json = array();
    while ($row = mysqli_fetch_array($result)) {
        //Datos del json
        $json[] = array(
            'name' => $row['name'],
            'id' => $row['id']
        );
    }

    $jsonString = json_encode($json); 
    echo $jsonString;
}
?>